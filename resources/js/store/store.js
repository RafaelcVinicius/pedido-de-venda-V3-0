import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({

    state: {
        displayProduto:true,
        displayEditarProduto:false,
        dadosTabela:{
            campo1:Number,
            campo2:String,
            campo3:Number,
            },

        dadosPedido:{
            vendedor:{
                nome:'',
                id:'',
            },
            previsaoEntrega:'',
            status:'Aberto',
            cliente:{
                id:'',
                nome:'',
                cnpjcpf:'',
            },
            itens:[]
        }
    },
    getters: {
        cnpjcpfCliente(state){            
            return state.dadosPedido.cliente.cnpjcpf
        },
        listaDeProdutos(state){
            return state.dadosPedido.itens
        },
        valorTotalUn(state){
            return state.dadosPedido.itens.map(produto => ((produto.acrescimo / 100) * (produto.valor * produto.qtde) - (produto.desconto / 100) * (produto.valor * produto.qtde)) + produto.valor * produto.qtde )
        }
    },
    mutations: {
        addRegistroTabela(state, payload){
            state.dadosTabela = payload
        },
        alterarStatus(state, payload){
            state.dadosPedido.status = payload
        },
        gravarCliente(state, payload){
            state.dadosPedido.cliente.id = payload.campo1
            state.dadosPedido.cliente.nome = payload.campo2
            state.dadosPedido.cliente.cnpjcpf = payload.campo3
            state.displayProduto = payload.display
        },
        gravarProduto(state, payload){
            const itemExists = state.dadosPedido.itens.findIndex((i) => i.id === payload.campo1);
            if(itemExists >= 0 ){
                state.dadosPedido.itens[itemExists].qtde++;
            } else {         
                let dados = {}
                dados.id = Number(payload.campo1)
                dados.nome = payload.campo2
                dados.desconto = Number(0)
                dados.codbarras = Number(payload.campo3)
                dados.valor = Number(payload.campo5)
                dados.qtde = Number(1)
                dados.acrescimo = Number(0)
                state.dadosPedido.itens.push(dados);               
            }
        },
        delProduto(state, payload){
            state.dadosPedido.itens.splice(payload, 1)
        },
        showDisplayEditarProduto(state, payload){
            state.displayEditarProduto = !state.displayEditarProduto
        },
        clonandoObjeto(state, payload){
           console.log(state.dadosPedido.itens[payload])


        }
    },
    actions:{
        alterarCliente({commit}, payload) {
            if(payload){
                payload.display = true
                commit('gravarCliente', payload)
            }else{
                let valor={};
                valor.campo1 = ''
                valor.campo2 = ''
                valor.campo3 = ''
                valor.display = false
                commit('gravarCliente', valor)
            }
        },
        addProduto({commit}, payload) {            
            commit('gravarProduto', payload)            
        },
        alterarProduto({commit}, payload) {       
            commit('showDisplayEditarProduto', true)
            commit('clonandoObjeto', payload)

        }
    }
})
