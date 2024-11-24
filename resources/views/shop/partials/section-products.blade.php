<section class="container py-5 pb-5 mb-1 mb-sm-3 mb-lg-4 mb-xl-5">
    <h2 class="h3 pb-2 pb-sm-3">
        {{ $title }}
    </h2>
    <div class="position-relative pb-xxl-3">
        <button
            type="button"
            class="popular-prev-{{$title}} btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle mt-n5 d-none d-sm-inline-flex"
            aria-label="Prev"
        >
            <i class="ci-chevron-left fs-lg animate-target"></i>
        </button>
        <button
            type="button"
            class="popular-next-{{$title}} btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 start-100 z-2 translate-middle mt-n5 d-none d-sm-inline-flex"
            aria-label="Next"
        >
            <i class="ci-chevron-right fs-lg animate-target"></i>
        </button>

        <div
            class="swiper"
            data-swiper='{
            "slidesPerView": 2,
            "spaceBetween": 24,
            "loop": true,
            "navigation": {
              "prevEl": ".popular-prev-{{$title}}",
              "nextEl": ".popular-next-{{$title}}"
            },
            "breakpoints": {
              "768": {
                "slidesPerView": 3
              },
              "992": {
                "slidesPerView": 4
              }
            }
          }'
        >
            <div class="swiper-wrapper">
                @foreach($products as $product)
                    <div class="swiper-slide">
                        @include('shop.partials.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- External slider prev/next buttons visible on screens < 500px wide (sm breakpoint) -->
    <div class="d-flex justify-content-center gap-2 mt-1 pt-4 d-sm-none">
        <button
            type="button"
            class="popular-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1"
            aria-label="Prev"
        >
            <i class="ci-chevron-left fs-lg animate-target"></i>
        </button>
        <button
            type="button"
            class="popular-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end"
            aria-label="Next"
        >
            <i class="ci-chevron-right fs-lg animate-target"></i>
        </button>
    </div>
</section>
