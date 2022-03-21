import Vue from 'vue';
import './plugins/axios';
import store from './store/store';
import VMask from 'v-mask';
import Money from 'v-money';

Vue.use(VMask);
Vue.use(Money);


require('./bootstrap');

window.Vue = require('vue').default;

// components globais
Vue.component('CadastroCliente', require('./components/cliente/CadastroCliente.vue').default);

Vue.component('CadastroProduto', require('./components/produto/CadastroProduto.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
