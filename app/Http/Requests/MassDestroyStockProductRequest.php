<?php

namespace App\Http\Requests;

use App\Models\StockProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_products,id',
        ];
    }
}
