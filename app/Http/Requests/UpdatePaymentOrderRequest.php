<?php

namespace App\Http\Requests;

use App\Models\PaymentOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_order_edit');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'payment_method' => [
                'required',
            ],
            'amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_status' => [
                'required',
            ],
        ];
    }
}
