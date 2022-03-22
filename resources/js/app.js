import Vue from 'vue';
import './plugins/axios';
import store from './store/store';
import VMask from 'v-mask';
import Money from 'v-money';
import sortBy from "sort-by";

Vue.use(VMask);
Vue.use(Money);
Vue.use(sortBy);


require('./bootstrap');

window.Vue = require('vue').default;

// components globais

//cadastrar cliente
Vue.component('CadastroCliente', require('./components/cliente/CadastroCliente.vue').default);
//cadastrar produto
Vue.component('CadastroProduto', require('./components/produto/CadastroProduto.vue').default);
//tabela para apresentar produtos igual data table
Vue.component('DadosTabela', require('./components/tabela/DadosTabela.vue').default);


//pedido de venda principal. 
Vue.component('PedidoDeVenda', require('./components/pedido/PedidoDeVenda.vue').default);

Vue.component('DadosCliente', require('./components/pedido/DadosCliente.vue').default);

Vue.component('ListaProdutos', require('./components/pedido/ListaProdutos.vue').default);

Vue.component('PedidoStatus', require('./components/pedido/PedidoStatus.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
