<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockProductRequest;
use App\Http\Requests\StoreStockProductRequest;
use App\Http\Requests\UpdateStockProductRequest;
use App\Models\Product;
use App\Models\StockProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockProducts = StockProduct::with(['product'])->get();

        return view('admin.stockProducts.index', compact('stockProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stockProducts.create', compact('products'));
    }

    public function store(StoreStockProductRequest $request)
    {
        $stockProduct = StockProduct::create($request->all());

        return redirect()->route('admin.stock-products.index');
    }

    public function edit(StockProduct $stockProduct)
    {
        abort_if(Gate::denies('stock_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stockProduct->load('product');

        return view('admin.stockProducts.edit', compact('products', 'stockProduct'));
    }

    public function update(UpdateStockProductRequest $request, StockProduct $stockProduct)
    {
        $stockProduct->update($request->all());

        return redirect()->route('admin.stock-products.index');
    }

    public function show(StockProduct $stockProduct)
    {
        abort_if(Gate::denies('stock_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockProduct->load('product');

        return view('admin.stockProducts.show', compact('stockProduct'));
    }

    public function destroy(StockProduct $stockProduct)
    {
        abort_if(Gate::denies('stock_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockProductRequest $request)
    {
        $stockProducts = StockProduct::find(request('ids'));

        foreach ($stockProducts as $stockProduct) {
            $stockProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
