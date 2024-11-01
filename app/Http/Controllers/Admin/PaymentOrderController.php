<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentOrderRequest;
use App\Http\Requests\StorePaymentOrderRequest;
use App\Http\Requests\UpdatePaymentOrderRequest;
use App\Models\Order;
use App\Models\PaymentOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentOrders = PaymentOrder::with(['order'])->get();

        $orders = Order::get();

        return view('admin.paymentOrders.index', compact('orders', 'paymentOrders'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.paymentOrders.create', compact('orders'));
    }

    public function store(StorePaymentOrderRequest $request)
    {
        $paymentOrder = PaymentOrder::create($request->all());

        return redirect()->route('admin.payment-orders.index');
    }

    public function edit(PaymentOrder $paymentOrder)
    {
        abort_if(Gate::denies('payment_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paymentOrder->load('order');

        return view('admin.paymentOrders.edit', compact('orders', 'paymentOrder'));
    }

    public function update(UpdatePaymentOrderRequest $request, PaymentOrder $paymentOrder)
    {
        $paymentOrder->update($request->all());

        return redirect()->route('admin.payment-orders.index');
    }

    public function show(PaymentOrder $paymentOrder)
    {
        abort_if(Gate::denies('payment_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentOrder->load('order');

        return view('admin.paymentOrders.show', compact('paymentOrder'));
    }

    public function destroy(PaymentOrder $paymentOrder)
    {
        abort_if(Gate::denies('payment_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentOrderRequest $request)
    {
        $paymentOrders = PaymentOrder::find(request('ids'));

        foreach ($paymentOrders as $paymentOrder) {
            $paymentOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
