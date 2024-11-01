@extends('layouts.site')

@section('title', 'Perguntas Frequentes')

@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a title="Página inicial" href="/"><i class="fa fa-home"></i> Início</a>
                        <span>Perguntas Frequentes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="internal">
        <section class="pb-5" id="terms">
            <div class="container">
                <div class="col-12">
                    <header class="entry-header-outer mt-5">
                        <div class="entry-header" style="text-align: center;">
                            <h2 class="post-title entry-title fw-bold">
                                Perguntas Frequentes
                            </h2>
                        </div>
                    </header>
                </div>

                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        @foreach($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>
    </main>
@endsection
