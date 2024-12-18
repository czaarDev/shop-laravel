@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.order.fields.id') }}</th>
                        <th>{{ trans('cruds.order.fields.user') }}</th>
                        <th>{{ trans('cruds.order.fields.order_item') }}</th>
                        <th>Endereço</th>
                        <th>{{ trans('cruds.order.fields.amount') }}</th>
                        <th>{{ trans('cruds.order.fields.payment_method') }}</th>
                        <th>{{ trans('cruds.order.fields.payment_status') }}</th>
                        <th>{{ trans('cruds.order.fields.delivery_status') }}</th>
                        <th>Data compra</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}" style="width: 75px;"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                <b>Nome:</b> {{ $order->user->name }} <br>
                                <b>Email:</b> {{ $order->user->email }} <br>
                                <b>Telefone:</b> {{ $order->user->phone_number }} <br>
                                <b>CPF:</b> {{ $order->user->document_number }} <br>
                            </td>
                            <td>
                                @foreach($order->order_items as $key => $item)
                                    {{ $item->quantity }}
                                    ▪
                                    <a href="{{ route('admin.products.show', $item->product_id) }}" target="_blank">
                                        {{ $item?->product?->name }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($order->address)
                                    {{ $order->address->zip }} <br>
                                    {{ $order->address->street_address1 }} <br>
                                    {{ $order->address->street_address2 }} <br>
                                    {{ $order->address->city }} - {{ $order->address->state }}
                                @endif
                            </td>
                            <td>
                                {{ \Illuminate\Support\Number::currency($order->amount, 'BRL', 'pt-br') }}
                            </td>
                            <td>
                                {{ $order->payment_method }}
                            </td>
                            <td>
                                {{ $order->payment_status ?? '' }}
                            </td>
                            <td>
                                {{ $order->payment_status ?? '' }}
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <div class="d-flex flex-column align-items-center" style="gap: 4px">
                                    @can('order_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('order_edit')
                                        @if($order->isPending())
                                            <form action="{{ route('admin.orders.approvePayment', $order->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja aprovar o pagamento deste pedido?');" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-info" value="Aprovar pagamento">
                                            </form>
                                        @endif

                                        @if($order->isPaid())
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.orders.delivery', $order->id) }}">
                                                Status de entrega
                                            </a>
                                        @endif
                                    @endcan

                                    @can('order_delete')
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </div>
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
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
