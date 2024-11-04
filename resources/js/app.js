import { createApp } from 'vue';
import store from './store';
import HeaderComponent from './components/Header.vue';
import AddToCartComponent from './components/AddToCartComponent.vue';

const app = createApp({});

app.component('header-component', HeaderComponent);
app.component('add-to-cart-component', AddToCartComponent);

app.use(store);
app.mount('#app');
