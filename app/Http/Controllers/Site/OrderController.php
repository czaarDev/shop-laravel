<?php

namespace App\Http\Controllers\Site;

use App\Enums\Gateway;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\DiscountCouponRepository;
use App\Repositories\OrderRepository;
use App\Services\Asaas\Customer;
use App\Services\Asaas\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        public OrderRepository $orderRepository,
        public DiscountCouponRepository $discountCouponRepository,
    ) {
    }

    public function payment(): View
    {
        if (!session()->has('cart')) {
            toastr()->addInfo('Você ainda não adicionou nenhum produto ao carrinho.');
        }

        return view('site.order.payment');
    }

    public function pay(Request $request): RedirectResponse
    {
        try {
            if (auth()->check()) {
                $user = auth()->user();
                $shippingAddress = $user->shippingAddresses()->updateOrCreate(
                    $request->address,
                    $request->address
                );
            } else {
                // criar usuário
                $user = User::query()->where(function ($query) use ($request) {
                    $query->where('email', $request->email)
                        ->orWhere('document_number', 'like', '%' . $request->document_number . '%')
                        ->orWhere('phone_number', 'like', '%' . $request->phone_number . '%');
                })->first();

                if (!$user) {
                    $user = User::query()->create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'document_number' => $request->document_number,
                        'phone_number' => $request->phone_number,
                        'password' => bcrypt(preg_replace('/[^0-9]/', '', $request->document_number)),
                    ]);
                }

                $shippingAddress = $user->shippingAddresses()->updateOrCreate(
                    $request->address,
                    $request->address
                );

                $user->refresh();
            }

            $cart = session()->get('cart')
                ? collect(session()->get('cart'))
                : collect();

            $order_items = $cart->map(function ($item, $key) {
                return [
                    'product_id' => $key,
                    'price' => $item['price'],
                    "quantity" => 1,
                    "total" => $item['price'] * 1,
                ];
            });

            $amount = $cart->sum('price');

            // cupom de desconto aplicado
            if (!empty($request->code)) {
                $coupon = $this->discountCouponRepository->validateCoupon($request->code);
                $valueDiscount = $this->discountCouponRepository->getValueDiscount($coupon, $amount);

                $amount -= $valueDiscount;
            }

            $amount += $request->shipping_value;

            // criar cliente asaas
            $customerGateway = (new Customer())->findONewCustomer(
                $user->document_number,
                [
                    "name" => $user->name,
                    "cpfCnpj" => $user->document_number,
                    "email" => $user->email,
                    "phone" => $user->phone_number,
                    "mobilePhone" => $user->phone_number,
                ]
            );

            $dataPayment = [
                "customer" => $customerGateway->id,
                "billingType" => $request->payment,
                "value" => $amount,
                "dueDate" => date('Y-m-d', strtotime('+1 day')),
                "description" => $cart->implode('name', ', '),
                "externalReference" => "Compra Loja Vortex",
            ];

            if ($request->payment == 'credit_card') {
                $dataPayment += [
                    "installmentCount" => $request->installment_quantity_credit_card,
                    "installmentValue" => ($amount / $request->installment_quantity_credit_card ?? 1),
                    "creditCard" => [
                        "holderName" => $request->holdername_credit_card,
                        "number" => $request->number_credit_card,
                        "expiryMonth" => $request->month_credit_card,
                        "expiryYear" => $request->year_credit_card,
                        "ccv" => $request->cvv_credit_card,
                    ],
                    "creditCardHolderInfo" => [
                        "name" => $user->name,
                        "email" => $user->email,
                        "cpfCnpj" => $user->document_number,
                        "phone" => $user->phone_number,
                        "mobilePhone" => $user->phone_number,
                        "postalCode" => $user->address->zip_code ?? '64051090',
                        "addressNumber" => $user->address->number ?? '2185',
                    ],
                    'remoteIp' => $request->ip(),
                ];
            }

            $paymentGateway = (new Payment())->createPayment($dataPayment);

            if (isset($paymentGateway->errors)) {
                toastr()->addError($paymentGateway->errors[0]->description);

                return back();
            }

            // criar registro de pagamento, itens e desconto no banco de dados
            $order = $this->orderRepository->create([
                "user_id" => $user->id,
                "payment_method" => $request->payment,
                "amount" => $amount,
                "payment_status" => $paymentGateway->status,
                "external_identification" => $paymentGateway->id,
                "external_url" => $paymentGateway->invoiceUrl ?? "",
                "gateway" => Gateway::ASAAS,
                "response_gateway" => $paymentGateway,
                "order_items" => $order_items,
                "delivery_address_id" => $shippingAddress->id,
                "order_payments" => [
                    [
                        "payment_method" => $request->payment,
                        "amount" => $amount,
                        "payment_status" => $paymentGateway->status,
                    ],
                ]
            ]);

            $order->attributes = $request->only(['shipping_name', 'shipping_value']);
            $order->save();

            if ($order->isPaid()) {
                event(new \App\Events\OrderApproved($order));
            }

            event(new \App\Events\OrderCreated($order));

            return redirect()->route('site.order.thanksPayment', $order);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function thanksPayment(\App\Models\Order $order): View
    {
        return view('site.order.thanksPayment', compact('order'));
    }

}
