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
                    @forelse($orders as $item)
                        <ul class="list-group" style="margin-bottom: 10px;">
                            <h5 class="list-group-item" style="font-weight: bold;">
                                Status: {{ $item->payment_status }}
                            </h5>
                            <li class="list-group-item">
                                <div class="row align-items-center text-center">
                                    <div class="col-lg-2">
                                        <p style="font-size: 85%; font-weight: bold; line-height:20px;">Nº do pedido</p>
                                        # {{ $item->id }}
                                    </div>
                                    <div class="col-lg-3">
                                        <p style="font-size: 85%; font-weight: bold;">Data da compra</p>
                                        {{ $item->created_at->format('d/m/Y H:i:s') }}
                                    </div>
                                    <div class="col-lg-3">
                                        <p style="font-size: 85%; font-weight: bold;">Produto(s)</p>
                                        <small>{{ $item->order_items->implode('product.name', ', ') }}</small>
                                    </div>
                                    <div class="col-lg-2">
                                        <p style="font-size: 85%; font-weight: bold;">Valor Total</p>
                                        R$ {{ number_format($item->amount, 2, ',', '.') }}
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-sm btn-brand"
                                           title="Detalhes da compra"
                                           href="{{ route('site.user-logged.order', $item->id) }}"
                                           style="font-weight: bold"
                                        >
                                            Detalhes da compra
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @empty
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa fa-info-circle"></i>
                            Você ainda realizou nenhuma compra.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <hr />
@endsection
