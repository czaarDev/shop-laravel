<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiscountCouponRequest;
use App\Http\Requests\StoreDiscountCouponRequest;
use App\Http\Requests\UpdateDiscountCouponRequest;
use App\Models\DiscountCoupon;
use App\Models\Product;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DiscountCouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discount_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discountCoupons = DiscountCoupon::with('products')
            ->latest('id')
            ->get();

        return view('admin.discountCoupons.index', compact('discountCoupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('discount_coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::active()->get(['id', 'name']);

        return view('admin.discountCoupons.form', compact('products'));
    }

    public function store(StoreDiscountCouponRequest $request)
    {
        $discountCoupon = DiscountCoupon::create($request->all());

        $discountCoupon->products()->sync($request->input('products', []));

        return redirect()->route('admin.discount-coupons.index');
    }

    public function edit(DiscountCoupon $discountCoupon)
    {
        abort_if(Gate::denies('discount_coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::active()->get(['id', 'name']);

        return view('admin.discountCoupons.form', compact('discountCoupon', 'products'));
    }

    public function update(UpdateDiscountCouponRequest $request, DiscountCoupon $discountCoupon)
    {
        $discountCoupon->update($request->all());

        $discountCoupon->products()->sync($request->input('products', []));

        return redirect()->route('admin.discount-coupons.index');
    }

    public function show(DiscountCoupon $discountCoupon)
    {
        abort_if(Gate::denies('discount_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discountCoupons.show', compact('discountCoupon'));
    }

    public function destroy(DiscountCoupon $discountCoupon)
    {
        abort_if(Gate::denies('discount_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discountCoupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiscountCouponRequest $request)
    {
        DiscountCoupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
