@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.discountCoupon.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discount-coupons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.id') }}
                        </th>
                        <td>
                            {{ $discountCoupon->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.code') }}
                        </th>
                        <td>
                            {{ $discountCoupon->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.description') }}
                        </th>
                        <td>
                            {{ $discountCoupon->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.amount') }}
                        </th>
                        <td>
                            {{ $discountCoupon->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\DiscountCoupon::TYPE_RADIO[$discountCoupon->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.quantity') }}
                        </th>
                        <td>
                            {{ $discountCoupon->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.start_at') }}
                        </th>
                        <td>
                            {{ $discountCoupon->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.end_at') }}
                        </th>
                        <td>
                            {{ $discountCoupon->end_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $discountCoupon->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.discount-coupons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection