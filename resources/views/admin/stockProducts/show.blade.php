@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stockProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stockProduct.fields.id') }}
                        </th>
                        <td>
                            {{ $stockProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockProduct.fields.product') }}
                        </th>
                        <td>
                            {{ $stockProduct->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockProduct.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\StockProduct::TYPE_RADIO[$stockProduct->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockProduct.fields.quantity') }}
                        </th>
                        <td>
                            {{ $stockProduct->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection