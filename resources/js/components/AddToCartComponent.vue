<template>
    <button @click="addToCart">Adicionar ao Carrinho</button>
</template>

<script>
import { useStore } from 'vuex';

export default {
    props: {
        productId: {
            type: Number,
            required: true,
        },
    },
    setup(props) {
        const store = useStore();

        const addToCart = () => {
            store.commit('addProductToCart', props.productId);
        };

        return {
            addToCart,
        };
    }
}
</script>
