<template>
    <button
        type="button"
        class="btn btn-icon fs-xl btn-outline-secondary position-relative border-0 rounded-circle animate-scale"
        data-bs-toggle="offcanvas"
        data-bs-target="#shoppingCart"
        aria-controls="shoppingCart"
        aria-label="Shopping cart"
    >
            <span
                class="position-absolute top-0 start-100 badge fs-xs text-bg-primary rounded-pill ms-n3 z-2"
                style="--cz-badge-padding-y: 0.25em; --cz-badge-padding-x: 0.42em"
            >
                {{ cartCount }}
            </span>
        <i class="ci-shopping-bag animate-target"></i>
    </button>
</template>

<script>
import {computed} from 'vue';
import {useStore} from 'vuex';

export default {
    setup() {
        const store = useStore();
        const cartCount = computed(() => store.state.cartCount);

        return {
            cartCount
        };
    },
}
</script>
