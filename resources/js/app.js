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
     //bloco cliente   
    Vue.component('DadosCliente', require('./components/pedido/dadoscliente/DadosCliente.vue').default);
    Vue.component('PedidoStatus', require('./components/pedido/dadoscliente/PedidoStatus.vue').default);
    Vue.component('PesquisaPedidoCliente', require('./components/pedido/dadoscliente/PesquisaPedidoCliente.vue').default);

    //bloco produto
    Vue.component('DadosProdutos', require('./components/pedido/dadosproduto/DadosProdutos.vue').default);
    Vue.component('PesquisaPedidoProduto', require('./components/pedido/dadosproduto/PesquisaPedidoProduto.vue').default);
    Vue.component('TabelaProdutos', require('./components/pedido/dadosproduto/TabelaProdutos.vue').default);
    Vue.component('EditarProdutos', require('./components/pedido/dadosproduto/EditarProdutos.vue').default);

    //outros    
    Vue.component('FormaDePagamento', require('./components/pedido/outros/FormaDePagamento.vue').default);
    Vue.component('DetalhesDoPedido', require('./components/pedido/outros/DetalhesDoPedido.vue').default);

    //button 
    
    Vue.component('BotaoSalvarPedido', require('./components/pedido/botao/BotaoSalvarPedido.vue').default);
https://www.digitalocean.com/community/tutorials/how-to-containerize-a-laravel-application-for-development-with-docker-compose-on-ubuntu-18-04-pt

const app = new Vue({
    store,
    el: '#app',
});
