@extends('layouts.shop')

@section('content')

    @if (isset($banners['HIGHLIGHT']) && count($banners['HIGHLIGHT']) > 0)
        <section class="hero-section">
            <div class="hero-items owl-carousel">
                @foreach ($banners['HIGHLIGHT'] as $banner)
                    <a title="{{ $banner->name }}" href="{{ $banner->link }}" target="_blank">
                        <div class="single-hero-items set-bg" data-setbg="{{ $banner->image->getUrl() }}">
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    @isset($products['Paradidáticos'])
        <!-- Popular products carousel -->
        @include('shop.partials.section-products', [
            'title' => 'Populares',
            'products' => $products['Paradidáticos']->products,
        ]);
    @endisset

    @isset($products['Jogos Educativos'])
        <!-- Popular products carousel -->
        @include('shop.partials.section-products', [
            'title' => 'Adicionados recentes',
            'products' => $products['Jogos Educativos']->products,
        ])
    @endisset
@endsection
