<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDeliveryRequest;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Delivery;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('delivery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveries = Delivery::with(['order', 'item'])->get();

        return view('admin.deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.deliveries.create', compact('items', 'orders'));
    }

    public function store(StoreDeliveryRequest $request)
    {
        $delivery = Delivery::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $delivery->id]);
        }

        return redirect()->route('admin.deliveries.index');
    }

    public function edit(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $delivery->load('order', 'item');

        return view('admin.deliveries.edit', compact('delivery', 'items', 'orders'));
    }

    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->all());

        return redirect()->route('admin.deliveries.index');
    }

    public function show(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery->load('order', 'item');

        return view('admin.deliveries.show', compact('delivery'));
    }

    public function destroy(Delivery $delivery)
    {
        abort_if(Gate::denies('delivery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryRequest $request)
    {
        $deliveries = Delivery::find(request('ids'));

        foreach ($deliveries as $delivery) {
            $delivery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('delivery_create') && Gate::denies('delivery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Delivery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
