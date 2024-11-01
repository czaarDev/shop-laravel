<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentOrderRequest;
use App\Http\Requests\UpdatePaymentOrderRequest;
use App\Http\Resources\Admin\PaymentOrderResource;
use App\Models\PaymentOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentOrderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentOrderResource(PaymentOrder::with(['order'])->get());
    }

    public function store(StorePaymentOrderRequest $request)
    {
        $paymentOrder = PaymentOrder::create($request->all());

        return (new PaymentOrderResource($paymentOrder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentOrder $paymentOrder)
    {
        abort_if(Gate::denies('payment_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentOrderResource($paymentOrder->load(['order']));
    }

    public function update(UpdatePaymentOrderRequest $request, PaymentOrder $paymentOrder)
    {
        $paymentOrder->update($request->all());

        return (new PaymentOrderResource($paymentOrder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentOrder $paymentOrder)
    {
        abort_if(Gate::denies('payment_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentOrder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
