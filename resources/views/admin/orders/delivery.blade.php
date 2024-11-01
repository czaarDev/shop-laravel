@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header font-weight-bold">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Atualizar status de entrega do pedido #{{ $order->id }}</h4>

                <div>
                    <h3><span class="badge badge-secondary">Status atual: <u>{{ $order->delivery->statusName ?? '-' }}</u></span></h3>
                </div>
            </div>

        </div>

        <div class="card-body">
            <div>
                <b>Nome: </b> {{ $order->user->name }} <br>
                <b>E-mail: </b> {{ $order->user->email }} <br>
                <b>Telefone: </b> {{ $order->user->phone_number }} <br>
                <b>Produto(s):</b> {{ $order->order_items->implode('product.name', ', ') }} <br>
            </div>

            <form action="{{ route('admin.orders.updateDelivery', $order) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mt-4">
                    <label for="status">Status de entrega</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Selecione o status</option>
                        @foreach(\App\Enums\StatusDeliveryOrderEnum::getDescriptions() as $item)
                            <option value="{{ $item['value'] }}"
                                    @selected(old('status', $order?->delivery?->status == $item['value']))
                            >
                                {{ $item['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-4">
                    <label for="link">Link de rastreamento</label>
                    <input type="url"
                           name="link" id="link"
                           value="{{ $order?->delivery?->link }}"
                           placeholder="digite o link de rastreamento"
                           class="form-control"
                    />
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>

        </div>
    </div>
@endsection
