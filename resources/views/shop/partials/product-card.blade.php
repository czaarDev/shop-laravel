<div class="animate-underline">
    <a
        class="ratio ratio-1x1 d-block mb-3"
        href="{{ route('site.product.show', $product) }}"
    >
        <img
            src="{{ $product->photo->first()->getUrl() }}"
            alt="{{ $product->name }}"
            class="hover-effect-target opacity-100"
        />
    </a>
    <h3 class="mb-2">
        <a
            class="d-block fs-sm fw-medium text-truncate"
            href="shop-product-furniture.html"
        >
                                  <span class="animate-target">
                                      {{ $product->name  }}
                                  </span>
        </a>
    </h3>
    <div class="h6"> {{ $product->brazilian_price  }}</div>
    <div class="d-flex gap-2">
        <button
            type="button"
            class="btn btn-dark w-100 rounded-pill px-3"
        >
            Adicionar ao carrinho
        </button>
        <button
            type="button"
            class="btn btn-icon btn-secondary rounded-circle animate-pulse"
            aria-label="Add to wishlist"
        >
            <i class="ci-heart fs-base animate-target"></i>
        </button>
    </div>
</div>
