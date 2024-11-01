<?php

namespace App\Http\Requests;

use App\Models\Delivery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeliveryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_create');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'item_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
