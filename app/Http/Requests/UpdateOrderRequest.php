<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'order_items.*' => [
                'integer',
            ],
            'order_items' => [
                'required',
                'array',
            ],
            'payment_method' => [
                'required',
            ],
        ];
    }
}
