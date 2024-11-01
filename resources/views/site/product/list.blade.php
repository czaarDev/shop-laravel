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
                        <span>{{ $title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categorias</h4>
                        <ul class="filter-catagories">
                            @foreach($productCategories as $productCategory)
                                <li>
                                    <a href="{{ route('site.product.index', ['category_id' => $productCategory->id]) }}">
                                        {{ $productCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @forelse($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('site.partials.product-item-list', ['product' => $product])
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-warning">
                                        Nenhum produto encontrado.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{ $products->appends(request()->query())->links() }}

                </div>
            </div>
        </div>
    </section>

    <hr />

@endsection
