<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ValidateCouponDiscountRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => [
                'string',
                'required',
                Rule::exists('discount_coupons', 'code')->where(function ($query) {
                    $query->whereRaw('NOW() BETWEEN start_at AND end_at')
                        ->where('is_active', true);
                }),
            ],
            'amount' => [
                'required',
                'gt:0',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]), 422);
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Cupom inválido.',
            'code.exists' => 'Cupom inválido ou expirado.',
            'amount.required' => 'Cupom inválido.',
            'amount.gt' => 'Cupom inválido.',
        ];
    }

}
