<div class="product-item">
    <div class="pi-pic">
        <a title="{{ $product->name }}" href="{{ route('site.product.show', $product) }}">
            <img src="{{ $product->photo->first()->getUrl() }}"
                 alt="{{ $product->name }}"
                 data-pagespeed-url-hash="1595659014"
                 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                 style="border-radius: 5px;"
                 loading="lazy"
            />
        </a>
    </div>
    <div class="pi-text">
        <a title="{{ $product->name }}" href="{{ route('site.product.show', $product) }}">
            <h5>{{ $product->name }}</h5>
        </a>
        <div class="product-price">
            {{ $product->brazilian_price }}
        </div>
    </div>
</div>
