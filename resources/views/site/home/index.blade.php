@extends('layouts.site')

@section('content')

    @if(isset($banners['HIGHLIGHT']) && count($banners['HIGHLIGHT']) > 0)
        <section class="hero-section">
            <div class="hero-items owl-carousel">
                @foreach($banners['HIGHLIGHT'] as $banner)
                    <a title="{{ $banner->name }}" href="{{ $banner->link }}" target="_blank">
                        <div class="single-hero-items set-bg" data-setbg="{{ $banner->image->getUrl() }}">
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @isset($products['Paradidáticos'])
        <section class="women-banner spad" style="padding-top: 50px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg section-product-banner"
                             data-setbg="/assets/site/images/paradidaticos.png"
                             style="height: 100%; background-size: 100%; border-radius: 10px;"
                        >
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="product-slider owl-carousel">
                            @foreach($products['Paradidáticos']->products as $product)
                                @include('site.partials.product-item-list', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    <section class="container">
        @if(isset($banners['MIDDLE_HOME']) && count($banners['MIDDLE_HOME']) > 0)
            <section class="hero-section">
                <div class="hero-items owl-carousel">
                    @foreach($banners['MIDDLE_HOME'] as $banner)
                        <a title="{{ $banner->name }}" href="{{ $banner->link }}" target="_blank">
                            <div class="single-hero-items set-bg"
                                 data-setbg="{{ $banner->image->getUrl() }}"
                                 style="height: auto;"
                            >
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </section>

    @isset($products['Jogos Educativos'])
        <section class="man-banner spad section-jogos-educativos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-slider owl-carousel">
                            @foreach($products['Jogos Educativos']->products as $product)
                                @include('site.partials.product-item-list', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-large set-bg"
                             data-setbg="/assets/site/images/jogos-educativos.png"
                             style="height: 100%; background-size: 100%; border-radius: 10px; padding-top: 100%;"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    @isset($products['Itinerários'])
        <section class="man-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg"
                             data-setbg="/assets/site/images/itinerarios.png"
                             style="height: 100%; background-size: 100%; border-radius: 10px; padding-top: 100%;"
                        >
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="product-slider owl-carousel">
                            @foreach($products['Itinerários']->products as $product)
                                @include('site.partials.product-item-list', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    @isset($products['Livros'])
        <section class="man-banner spad section-itinerarios">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-slider owl-carousel">
                            @foreach($products['Livros']->products as $product)
                                @include('site.partials.product-item-list', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-large set-bg"
                             data-setbg="/assets/site/images/livros.png"
                             style="height: 100%; background-size: 100%; border-radius: 10px; padding-top: 100%;"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    <div class="instagram-photo">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>
                        <i class="fab fa-instagram"></i>
                        Acompanhe nosso instagram
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- SnapWidget -->
            <script src="https://snapwidget.com/js/snapwidget.js"></script>
            <iframe src="https://snapwidget.com/embed/1040415" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
        </div>
    </div>

    <section class="latest-blog spad">
        <div class="container">
            <div class="benefit-items">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="/assets/site/images/icon-1.png.webp"
                                     alt="ENTREGA GARANTIDA"
                                     data-pagespeed-url-hash="157847617" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                     loading="lazy"
                                />
                            </div>
                            <div class="sb-text">
                                <h6>ENTREGA GARANTIDA</h6>
                                <p>Seu pedido entregue no conforto de sua casa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="/assets/site/images/icon-2.png.webp"
                                     alt="ENTREGA RÁPIDA"
                                     data-pagespeed-url-hash="157847617" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                     loading="lazy"
                                />
                            </div>
                            <div class="sb-text">
                                <h6>ENTREGA RÁPIDA</h6>
                                <p>Compre com seu cartão e divida em até 10x s/ juros</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="/assets/site/images/icon-3.png.webp"
                                     alt="PAGAMENTO SEGURO"
                                     data-pagespeed-url-hash="157847617" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                     loading="lazy"
                                />
                            </div>
                            <div class="sb-text">
                                <h6>PAGAMENTO SEGURO</h6>
                                <p>Dados financeiros protegidos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
