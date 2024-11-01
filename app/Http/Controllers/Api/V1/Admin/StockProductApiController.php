<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockProductRequest;
use App\Http\Requests\UpdateStockProductRequest;
use App\Http\Resources\Admin\StockProductResource;
use App\Models\StockProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockProductApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockProductResource(StockProduct::with(['product'])->get());
    }

    public function store(StoreStockProductRequest $request)
    {
        $stockProduct = StockProduct::create($request->all());

        return (new StockProductResource($stockProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StockProduct $stockProduct)
    {
        abort_if(Gate::denies('stock_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockProductResource($stockProduct->load(['product']));
    }

    public function update(UpdateStockProductRequest $request, StockProduct $stockProduct)
    {
        $stockProduct->update($request->all());

        return (new StockProductResource($stockProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StockProduct $stockProduct)
    {
        abort_if(Gate::denies('stock_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
