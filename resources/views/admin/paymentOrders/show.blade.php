@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paymentOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentOrder.fields.id') }}
                        </th>
                        <td>
                            {{ $paymentOrder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentOrder.fields.order') }}
                        </th>
                        <td>
                            {{ $paymentOrder->order->amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentOrder.fields.payment_method') }}
                        </th>
                        <td>
                            {{ App\Models\PaymentOrder::PAYMENT_METHOD_SELECT[$paymentOrder->payment_method] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentOrder.fields.amount') }}
                        </th>
                        <td>
                            {{ $paymentOrder->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentOrder.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\PaymentOrder::PAYMENT_STATUS_SELECT[$paymentOrder->payment_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection