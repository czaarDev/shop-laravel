<?php

namespace App\Http\Controllers\Api\V1\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateCouponDiscountRequest;
use App\Repositories\DiscountCouponRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DiscountCouponApiController extends Controller
{

    public function __construct(
        public DiscountCouponRepository $discountCouponRepository
    ) { }

    public function validateCoupon(ValidateCouponDiscountRequest $request): JsonResponse
    {
        try {
            $coupon = $this->discountCouponRepository->validateCoupon($request->code);

            if ($coupon->quantity && $coupon->usage->count() >= $coupon->quantity) {
                throw new \Exception('Cupom excedido.', Response::HTTP_GONE);
            }

            $idsProductsCart  = array_keys(session('cart'));
            $couponProductIds = $coupon->products->pluck('id')->toArray();
            $intersection     = array_intersect($idsProductsCart, $couponProductIds);

            if ($coupon->products->count() && count($intersection) !== count($idsProductsCart)) {
                throw new \Exception('Este cupom não pode ser usado neste produto.', Response::HTTP_FORBIDDEN);
            }

            $amount = $request->validated('amount');

            $valueDiscount = $this->discountCouponRepository->getValueDiscount($coupon, $amount);

            if (($valueDiscount >= $amount) || $valueDiscount < 0) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Validation errors',
                    'data'      => [
                        'amount' => 'Este cupom não pode ser usado nesta compra.',
                    ],
                ], Response::HTTP_FORBIDDEN);
            }

//            $email_customer = $request->email_customer ?? '';

//            if (! empty($email_customer)) {
//                if ($coupon->once_per_customer && $coupon->usageByClient($email_customer)->count()) {
//                    throw new \Exception('Você já usou este cupom uma vez e não pode mais usá-lo.', Response::HTTP_FORBIDDEN);
//                }
//            }

            $response = [
                'success' => true,
                'data' => [
                    'message' => 'Cupom aplicado.',
                    'valueDiscount' => $valueDiscount,
                    'coupon' => [
                        'id' => $coupon->id,
                        'code' => $coupon->code,
                        'is_direct_payment' => $coupon->is_direct_payment,
                    ]
                ],
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

}
