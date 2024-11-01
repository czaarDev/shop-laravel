<?php

namespace App\Http\Requests\Api;

use App\Models\AbandonedCart;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAbandonedCartRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'           => ['sometimes', 'string', 'max:255'],
            'email'          => ['required', 'email:rfc,dns', 'max:255'],
            'phone_number'   => ['sometimes', 'string', 'max:255'],
            'amount'         => ['required', 'gt:0'],
            'payment_method' => ['sometimes', 'string', 'max:255'],
            'product_id'     => ['required', 'exists:products,id'],
            'infosProduct'   => ['required', 'array'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

}
