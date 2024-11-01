<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:9'],
            'street_address1' => ['required', 'string', 'max:255'],
            'street_address2' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'is_shipping' => ['nullable', 'boolean'],
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'is_shipping' => true,
        ]);
    }
}
