@extends('layouts.site')

@section('title', $title)

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>{{ $title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-login-section spad" style="padding-top:40px;">
        <div class="container">
            <div class="row">

                @include('site.partials.menuUserLogged')

                <div class="col-xl-9 col-lg-9 col-md-9 col-9">
                    <div class="card">
                        <h5 class="card-header"></h5>
                        <div class="card-body  ">
                            <h4><b>Detalhes da Compra</b></h4>
                            <hr />

                            <div class="d-flex justify-content-start">
                                <b>Data da compra: </b>
                                <span> &nbsp; {{ $order->created_at->format('d/m/Y H:i') }}</span>
                            </div>

                            <div class="d-flex justify-content-start">
                                <b>Status de pagamento:</b>
                                <span> &nbsp; {{ $order->payment_status ?? '' }}</span>
                            </div>

                            <div class="d-flex justify-content-start">
                                <b>Forma de pagamento:</b>
                                <span> &nbsp; {{ $order->payment_method }}</span>
                            </div>

                            <div class="d-flex justify-content-start">
                                <b> Valor:</b>
                                <span> &nbsp; {{ \Illuminate\Support\Number::currency($order->amount, 'BRL', 'pt-br') }}</span>
                            </div>

                            <hr />

                            @if($order->address)
                                <div class="d-flex justify-content-start mb-3"><span><b>Dados da entrega:</b></span></div>

                                <div class="d-flex justify-content-start">
                                    <b>CEP:</b>
                                    <span> &nbsp; {{ $order->address->zip }}</span>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b>Endereço:</b>
                                    <span> &nbsp; {{ $order->address->street_address1 }}</span>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b> Bairro:</b>
                                    <span> &nbsp;{{ $order->address->street_address2 }}</span>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <b> Cidade:</b>
                                    <span> &nbsp;{{ $order->address->city }} - {{ $order->address->state }}</span>
                                </div>
                            @endif

                            @if($order->delivery)
                                <div class="d-flex justify-content-start">
                                    <b>Status da entrega:</b>
                                    <span> &nbsp; {{ $order->delivery->statusName }}</span>
                                </div>

                                <div class="">
                                    <b>Link de rastreio:</b>
                                    <span>
                                        &nbsp;
                                        <a href="{{ $order->delivery->link }}" target="_blank">
                                            {{ $order->delivery->link }}
                                        </a>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card mt-3">
                        <h5 class="card-header">Produtos da compra</h5>
                        <div class="card-body">
                            @foreach($order->order_items as $item)
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div style="width: 300px;">
                                        <img src="{{ $item->product?->photo?->first()?->getUrl() }}"
                                             alt="{{ $item->product->name }}"
                                            class="img-fluid"
                                             style="max-width: 100px;"
                                             loading="lazy"
                                        />
                                        <h5 class="card-title">
                                            {{ $item->product->name }}
                                        </h5>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Valor</h5>
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Number::currency($item->price, 'BRL', 'pt-br') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Quantidade</h5>
                                        <p class="card-text text-center"> {{ $item->quantity }}</p>
                                    </div>
                                    <div>
                                        <h5 class="card-title">Total</h5>
                                        <span>{{ \Illuminate\Support\Number::currency($item->total, 'BRL', 'pt-br') }} </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />
@endsection
