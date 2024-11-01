<?php

namespace App\Http\Controllers\Api\V1\Public\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsaasApiController extends Controller
{

    public function payments(Request $request): JsonResponse
    {
        try {
            if ($request->event == 'PAYMENT_CREATED') {
                return response()->json('Evento não suportado');
            }

            $order = Order::query()->firstWhere('external_identification', $request->payment['id']);

            if (!$order) {
                return response()->json('Pedido não encontrado', Response::HTTP_OK);
            }

            $dataToUpdate = [
                'payment_method'   => $request->payment['billingType'],
                'payment_status'   => $request->payment['status'],
                'response_gateway' => json_encode($request->payment),
            ];

            $order->update($dataToUpdate);

            $order->order_payments()->update([
                'payment_method' => $request->payment['billingType'],
                'payment_status' => $request->payment['status'],
            ]);

            $order->refresh();

            if ($order->isPaid()) {
                event(new \App\Events\OrderApproved($order));
            }

            return response()->json($order, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(
                ['message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /*
    public function checkPayments()
    {
        $paymentsToCheck = Payment::query()
            ->whereIn('status', Payment::$statusForPending)
            ->whereNotNull('external_identification')
            ->get();

        $paymentsUpdated = 0;

        foreach ($paymentsToCheck as $payment) {
            $paymentGateway = (new \App\Services\Asaas\Payment())->getPayment($payment->external_identification);

            if (isset($paymentGateway->status) && $paymentGateway->status != $payment->status) {
                $paymentsUpdated++;

                $dataToUpdate = [
                    'payment_method'   => $payment->billingType,
                    'status'           => $paymentGateway->status,
                    'paid_at'          => $payment->paymentDate,
                    'response_gateway' => $paymentGateway,
                ];

                $payment->update($dataToUpdate);

                $payment->refresh();

                if (in_array(strtolower($paymentGateway->status), array_map('strtolower', Payment::$statusForPaid))) {
                    event(new PaymentApproved($payment));
                }

                if (in_array(strtolower($paymentGateway->status), array_map('strtolower', Payment::$statusForCanceled))) {
                    $paymentGateway = (new \App\Services\Asaas\Payment())->removePayment($payment->external_identification);
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => [
                'payments_checked' => $paymentsToCheck->count(),
                'payments_updated' => $paymentsUpdated
            ]
        ]);
    }
    */

}
