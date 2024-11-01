@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.delivery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deliveries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.id') }}
                        </th>
                        <td>
                            {{ $delivery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.order') }}
                        </th>
                        <td>
                            {{ $delivery->order->amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.item') }}
                        </th>
                        <td>
                            {{ $delivery->item->quantity ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.quantity') }}
                        </th>
                        <td>
                            {{ $delivery->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Delivery::TYPE_RADIO[$delivery->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delivery.fields.comments') }}
                        </th>
                        <td>
                            {!! $delivery->comments !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deliveries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection