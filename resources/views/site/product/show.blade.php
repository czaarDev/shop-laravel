@extends('layouts.site')

@section('title', $title)

@section('description', $description)

@section('content')

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <a title="Produtos " href="">
                            {{ $product->categories->first()->name }}
                        </a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-pic-zoom">
                                <img src="{{ $product->photo->first()->getUrl() }}"
                                     alt="{{ $product->name }}"
                                     class="product-big-img"
                                     data-pagespeed-url-hash="3423245498"
                                     onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                     loading="lazy"
                                />
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach($product->photo as $photo)
                                        <div  @class(['pt', 'active' => $loop->first]) data-imgbigurl="{{ $photo->getUrl() }}">
                                            <img src="{{ $photo->getUrl('thumb') }}"
                                                 alt="{{ $product->name }}"
                                                 data-pagespeed-url-hash="3423245498"
                                                 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                                 loading="lazy"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>{{ $product->name }}</h3>
                                </div>

                                <div class="pd-desc">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                    <h4>
                                        R$ {{ number_format($product->price, 2, ',', '.') }}
                                    </h4>
                                </div>

                                <div class="quantity">
                                    <a href="javascript:void(0)"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->price }}"
                                        data-category="{{ $product->categories->first()->name }}"
                                        class="primary-btn pd-cart add_to_cart"
                                    >
                                        <i class="fa-solid fa-cart-plus"></i>
                                        Adicionar no carrinho
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">Informações</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {!! $product->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr/>

@endsection

@section('scripts')
    <script>
        window.onload = function () {
            fbq('track', 'ViewContent', {
                content_name: '{{ $product->name }}',
                content_category: '{{ $product->categories->first()->name }}',
                content_ids: ['{{ $product->id }}'],
                content_type: 'product',
                value: {{ $product->price }},
                currency: 'BRL'
            });
        };
    </script>
@endsection
