@extends('layouts.admin')
@section('content')
@can('discount_coupon_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.discount-coupons.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.discountCoupon.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.discountCoupon.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DiscountCoupon">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.start_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.end_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.discountCoupon.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($discountCoupons as $key => $discountCoupon)
                        <tr data-entry-id="{{ $discountCoupon->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $discountCoupon->code ?? '' }}
                            </td>
                            <td>
                                {{ $discountCoupon->description ?? '' }}
                            </td>
                            <td>
                                {{ $discountCoupon->amount ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DiscountCoupon::TYPE_RADIO[$discountCoupon->type] ?? '' }}
                            </td>
                            <td>
                                @foreach($discountCoupon->products as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $discountCoupon->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $discountCoupon->start_at ?? '' }}
                            </td>
                            <td>
                                {{ $discountCoupon->end_at ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $discountCoupon->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $discountCoupon->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('discount_coupon_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.discount-coupons.show', $discountCoupon->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('discount_coupon_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.discount-coupons.edit', $discountCoupon->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('discount_coupon_delete')
                                    <form action="{{ route('admin.discount-coupons.destroy', $discountCoupon->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('discount_coupon_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.discount-coupons.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-DiscountCoupon:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
