<?php

namespace App\Http\Requests;

use App\Models\DiscountCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDiscountCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_coupon_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:discount_coupons',
            ],
            'amount' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'is_active' => [
                'nullable',
            ],
        ];
    }
}
