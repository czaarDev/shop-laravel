@extends('layouts.site')

@section('title', $title)

@section('description', $description)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br>

                <h1 class="azul">{{ $page->title }}</h1>

                <hr style="border-color:#1D2029;">

                <div class="row">
                    <div class="col-xs-6">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
                <br>

                <div class="texto" style="margin-bottom: 50px;">
                    {!! $page->page_text !!}
                </div>

                <div style="clear:both;"></div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        jQuery(window).load(function() {
            const links = jQuery('.texto p a');

            links.each(function(index, el) {
                var href = jQuery(this).attr("href");

                if (href && (href.includes(".ogg") || href.includes(".mp3"))) {
                    jQuery(this).replaceWith(`<audio style="width: 100%;" controls><source src="${href}" type="audio/ogg">><source src="${href}" type="audio/mpeg"></audio>`)
                }

                if (href && (href.includes(".pdf"))) {
                    jQuery(this)
                        .replaceWith(`<iframe src="https://drive.google.com/viewerng/viewer?url=${href}?pid=explorer&efh=false&a=v&chrome=false&embedded=true" frameborder="0" scrolling="auto" height="1000" width="100%"></iframe>`)
                }
            });

        });
    </script>

@endsection
