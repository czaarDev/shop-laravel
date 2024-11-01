@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.save') }} {{ trans('cruds.discountCoupon.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ isset($discountCoupon) ? route("admin.discount-coupons.update", [$discountCoupon->id]) :  route("admin.discount-coupons.store") }}"
                  enctype="multipart/form-data"
            >
                @method(isset($discountCoupon) ? 'PUT' : 'POST')
                @csrf

                <div class="form-group">
                    <label class="required" for="code">{{ trans('cruds.discountCoupon.fields.code') }}</label>
                    <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $discountCoupon->code ?? "") }}" required>
                    @if($errors->has('code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.code_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.discountCoupon.fields.description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $discountCoupon->description ?? "") }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.description_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.discountCoupon.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $discountCoupon->amount ?? "") }}" step="0.01" required>
                    @if($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.amount_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required">{{ trans('cruds.discountCoupon.fields.type') }}</label>
                    @foreach(App\Models\DiscountCoupon::TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $discountCoupon->type ?? '') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.type_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="products">{{ trans('cruds.discountCoupon.fields.product') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}"
                                @selected(old('products', isset($discountCoupon) && $discountCoupon->products->contains($product->id)))
                            >
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('products'))
                        <div class="invalid-feedback">
                            {{ $errors->first('products') }}
                        </div>
                    @endif
                    <span class="help-block font-italic">{{ trans('cruds.discountCoupon.fields.product_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="quantity">{{ trans('cruds.discountCoupon.fields.quantity') }}</label>
                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $discountCoupon->quantity ?? "") }}" step="1">
                    @if($errors->has('quantity'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.quantity_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="start_at">{{ trans('cruds.discountCoupon.fields.start_at') }}</label>
                    <input class="form-control datetime {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text" name="start_at" id="start_at" value="{{ old('start_at', $discountCoupon->start_at ?? "") }}" required>

                    @if($errors->has('start_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.start_at_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="end_at">{{ trans('cruds.discountCoupon.fields.end_at') }}</label>
                    <input class="form-control datetime {{ $errors->has('end_at') ? 'is-invalid' : '' }}" type="text" name="end_at" id="end_at" value="{{ old('end_at', $discountCoupon->end_at ?? "") }}" required>

                    @if($errors->has('end_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.end_at_helper') }}</span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $discountCoupon->is_active ?? 1 || old('is_active', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">{{ trans('cruds.discountCoupon.fields.is_active') }}</label>
                    </div>
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.discountCoupon.fields.is_active_helper') }}</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
