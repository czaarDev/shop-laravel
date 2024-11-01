@extends('layouts.site')

@section('title', 'Carrinho de compras - '.config('app.name'))

@section('content')

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>Carrinho de compras</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th class="p-name">Produto</th>
                                    <th>Preço</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cart as $key => $item)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img src="{{ $item['image'] }}"
                                                 alt="{{ $item['name'] }}"
                                                 width="120"
                                                 loading="lazy"
                                            />
                                        </td>

                                        <td class="cart-title first-row">
                                            <h5>{{ $item['name'] }}</h5>
                                        </td>

                                        <td class="p-price first-row">
                                            R$ {{ number_format($item['price'], 2, ',', '.') }}
                                        </td>

                                        <td class="total-price first-row">
                                            R$ {{ number_format($item['price'], 2, ',', '.') }}
                                        </td>

                                        <td class="close-td first-row">
                                            <a href="{{ route('site.cart.destroy') }}"
                                               class="remove_from_cart"
                                               title="Remove item do carrinho"
                                               onclick="return confirm('Você tem certeza?')"
                                               data-id="{{ $key }}"
                                            >
                                                <i class="ti-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{ route('site.home.index') }}" class="primary-btn up-cart">Continuar comprando</a>
                            </div>
                        </div>

                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
{{--                                    <li class="subtotal">--}}
{{--                                        Subtotal--}}
{{--                                        <span>R$ 120,00</span>--}}
{{--                                    </li>--}}

                                    <li class="cart-total">
                                        Total
                                        <span>
                                            R$ {{ number_format($cart->sum('price'), 2, ',', '.') }}
                                        </span>
                                    </li>
                                </ul>

                                <a href="{{ route('site.order.payment') }}"
                                    title="Pagar e finalizar compra"
                                    @class(['proceed-btn', 'd-none' => $cart->isEmpty()])
                                >
                                    Ir para o pagamento
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr />

@endsection

