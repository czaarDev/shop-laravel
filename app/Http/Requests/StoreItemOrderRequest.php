<?php

namespace App\Http\Requests;

use App\Models\ItemOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_order_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
