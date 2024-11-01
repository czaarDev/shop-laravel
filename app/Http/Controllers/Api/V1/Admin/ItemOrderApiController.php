<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemOrderRequest;
use App\Http\Requests\UpdateItemOrderRequest;
use App\Http\Resources\Admin\ItemOrderResource;
use App\Models\ItemOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemOrderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemOrderResource(ItemOrder::with(['product'])->get());
    }

    public function store(StoreItemOrderRequest $request)
    {
        $itemOrder = ItemOrder::create($request->all());

        return (new ItemOrderResource($itemOrder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemOrder $itemOrder)
    {
        abort_if(Gate::denies('item_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemOrderResource($itemOrder->load(['product']));
    }

    public function update(UpdateItemOrderRequest $request, ItemOrder $itemOrder)
    {
        $itemOrder->update($request->all());

        return (new ItemOrderResource($itemOrder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemOrder $itemOrder)
    {
        abort_if(Gate::denies('item_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemOrder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
