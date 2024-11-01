<?php

namespace App\Http\Requests;

use App\Models\Testimony;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTestimonyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testimony_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'photo' => [
                'required',
            ],
            'testimony' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
