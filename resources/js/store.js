import { createStore } from 'vuex';

export default createStore({
    state: {
        cartCount: 0,
    },
    mutations: {
        addProductToCart(state) {
            state.cartCount++;
        },
    },
});
