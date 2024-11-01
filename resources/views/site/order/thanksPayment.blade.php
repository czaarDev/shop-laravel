@extends('layouts.site')

@section('styles')
    <style>
        body.n-site .navbar {
            background-color: #2a2c2c;
        }

        body.n-site .d-accent,
        body.n-site .d-full,
        body.n-site d-full-middle {
            display: none;
        }

        body.n-site .footer {
            padding-top: 50px;
        }
    </style>
@endsection

@section('content')
    <main class="internal bg-white">
        <div class="container">
            <div class="col-12">
                <div class="card overflow-hidden mt-4">
                    <div class="card-body">
                        <h2>{{ $order->user->name }}, seu pedido foi recebido!</h2>

                        <hr />

                        <h5 class="mt-2">
                            <b>Produto(s):</b> {{ $order->order_items->implode('product.name') }}
                        </h5>
                        <hr />

                        <h5 class="mt-2">
                            <b>Valor:</b> R$ {{ $order->amount }}
                        </h5>
                        <hr />

                        <h5 class="mt-2 d-flex align-items-center justify-content-between">
                            Forma de pagamento: {{ $order->payment_method }}
                            <a href="{{ $order->external_url }}" title="Clique aqui para fazer o pagamento" class="btn btn-success btn-sm" target="_blank">
                                <i class="ri-external-link-line"></i> &nbsp;
                                Clique aqui para fazer o pagamento
                            </a>
                        </h5>
                        <hr />

                        <h5 class="mt-2">
                            <b>Status de pagamento:</b>
                            {{ $order->payment_status }}
                        </h5>
                        <hr />

                        <h5 class="mt-2">
                            <b>Data:</b>
                            {{ $order->created_at->diffForHumans() }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script>
        let order = @json($order);

        let products = order.order_items.map(function (item) {
            return {
                id: item.product.id,
                name: item.product.name,
                quantity: item.quantity,
                price: item.product.price
            };
        });

        window.onload = function () {
            fbq('track', 'Purchase', {
                value: order.amount,
                currency: 'BRL',
                contents: products,
                content_type: 'product'
            });
        };
    </script>
@endsection
