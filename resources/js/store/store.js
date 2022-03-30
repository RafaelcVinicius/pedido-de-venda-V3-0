import { find, findIndex, forEach, map } from 'lodash'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


Vue.filter('colocarvirgula', valor => {
	return `${parseFloat(valor).toFixed(2)}`.replace('.', ',')
})

Vue.filter('cpfcnpj', function(valor) {
    const arr = `${valor}`.split('')

    if(arr.length === 11){
        arr.splice(3, 0, '.')
        arr.splice(7, 0, '.')
        arr.splice(11, 0, '-')
        return arr.join('')
    }
    else if(arr.length === 14){
        arr.splice(2, 0, '.')
        arr.splice(6, 0, '.')
        arr.splice(10, 0, '/')
        arr.splice(15, 0, '-')
        return arr.join('')
    }else{
        return ''
    }
})

Vue.filter('fone', function(valor) {
    const arr = `${valor}`.split('')

    if(arr.length === 11){
        arr.splice(0, 0, '(')
        arr.splice(3, 0, ')')
        arr.splice(4, 0, ' ')
        arr.splice(6, 0, '-')
        arr.splice(11, 0, '-')
        return arr.join('')
    }
    else if(arr.length === 10){
        arr.splice(0, 0, '(')
        arr.splice(3, 0, ')')
        arr.splice(4, 0, ' ')
        arr.splice(9, 0, '-')
        return arr.join('')
    }else{
        return ''
    }
})


export default new Vuex.Store({

    state: {
            //ativar ou desativar componentes
        displayProduto:false,
        displayEditarProduto:false,
        displayDetalhesPedido:false,

            //produtos da tabela ou clientes 
        dadosTabela:{
            campo1:Number,
            campo2:String,
            campo3:Number,
            },

            //item em edição
        itemEmEdicao:{},

            //estrutura do pedido
        dadosPedido:{
            idPedido:0,
            email:'',
            previsaoEntrega:'',
            status:'Aberto',
            vendedor:{
                nome:'',
                id:'',
            },
            cliente:{
                id:'',
                nome:'',
                cnpjcpf:'',
            },
            detalhamentoDeValores:{
                acrescimo:0,
                desconto:0,
            },
            obsPedido:'',
            tipoFrete:{
                tipo:'Nenhum',
                valor:0,
                id:1,
                cobranca: '0',
            },
            formasDePagamento:{},
            itens:[]
        },
            //Fim
    },
    getters: {
        cnpjcpfCliente(state){  
            var obj = {}; 

            obj.cnpjcpf = state.dadosPedido.cliente.cnpjcpf
          
                if( state.dadosPedido.cliente.cnpjcpf.length > 11){    
                    obj.mask = '##.###.###/####-##'
                }else{
                    obj.mask = '###.###.###-##'
                }          
            return obj
        },
        listaDeProdutos(state){
            return state.dadosPedido.itens
        },
        valorTotalUn(state){
            return state.dadosPedido.itens.map(produto => ((produto.acrescimo / 100) * (produto.valor * produto.qtde) - (produto.desconto / 100) * (produto.valor * produto.qtde)) + produto.valor * produto.qtde )
        },
        totalizadoresDoPedido(state){
            var obj={};
            obj.frete = state.dadosPedido.tipoFrete.valor
            obj.totalprodutos = state.dadosPedido.itens.map(produto => ((produto.acrescimo / 100) * (produto.valor * produto.qtde) - (produto.desconto / 100) * (produto.valor * produto.qtde)) + produto.valor * produto.qtde ).reduce((total, atual) => total + atual, 0).toFixed(2)
            obj.valortotal = eval(Number(state.dadosPedido.detalhamentoDeValores.acrescimo) + Number(state.dadosPedido.tipoFrete.valor) + Number(obj.totalprodutos) - Number(state.dadosPedido.detalhamentoDeValores.desconto)).toFixed(2) 
            return obj
        },
        detalhamentoValores(state){
            var obj={};
            obj.acrescimo = state.dadosPedido.detalhamentoDeValores.acrescimo
            obj.desconto  = state.dadosPedido.detalhamentoDeValores.desconto
            return obj
        },
        getFrete(state){
            var obj={}
            obj = state.dadosPedido.tipoFrete
            return obj
        },
        valorEspecies(state){
            return state.dadosPedido.formasDePagamento
        }
    },
    mutations: {   
        commitVendedor(state, payload){
            state.dadosPedido.vendedor = payload
        },  
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
            state.displayDetalhesPedido = true
            const itemExists = state.dadosPedido.itens.findIndex((i) => i.id === payload.campo1);
            if(itemExists >= 0 ){   
                state.dadosPedido.itens[itemExists].qtde++;
            } else {         
                let dados = {}
                dados.id         = Number(payload.campo1)
                dados.nome       = payload.campo2
                dados.desconto   = Number(0)
                dados.codbarras  = Number(payload.campo3)
                dados.valor      = Number(payload.campo5)
                dados.qtde       = Number(1)
                dados.acrescimo  = Number(0)
                dados.obs        = ''
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
            var obj = {...state.dadosPedido.itens[payload]}
            obj.index = payload
            state.itemEmEdicao.valor       = Number(obj.valor).toFixed(2)
            state.itemEmEdicao.qtde        = Number(obj.qtde).toFixed(2)
            state.itemEmEdicao.acrescimo   = Number(obj.acrescimo).toFixed(2)
            state.itemEmEdicao.desconto    = Number(obj.desconto).toFixed(2)
            state.itemEmEdicao.index       = Number(obj.index)
            state.itemEmEdicao.obs         = obj.obs        
        },
        commitAlteracoesProduto(state, payload){
            state.dadosPedido.itens[state.itemEmEdicao.index].qtde      = Number(state.itemEmEdicao.qtde.replace('.','').replace(',','.'))
            state.dadosPedido.itens[state.itemEmEdicao.index].valor     = Number(state.itemEmEdicao.valor.replace('.','').replace(',','.'))
            state.dadosPedido.itens[state.itemEmEdicao.index].acrescimo = Number(state.itemEmEdicao.acrescimo.replace('.','').replace(',','.'))
            state.dadosPedido.itens[state.itemEmEdicao.index].desconto  = Number(state.itemEmEdicao.desconto.replace('.','').replace(',','.'))
            state.dadosPedido.itens[state.itemEmEdicao.index].obs       = String(state.itemEmEdicao.obs)
        },
        alterarDetalheDeValores(state, payload){
            state.dadosPedido.detalhamentoDeValores.acrescimo = payload.acrescimo
            state.dadosPedido.detalhamentoDeValores.desconto = payload.desconto
        },
        commitTipoFrete(state, payload){
            state.dadosPedido.tipoFrete = {}
            state.dadosPedido.tipoFrete = payload
        },
        commitValorFrete(state, payload){
            state.dadosPedido.tipoFrete.valor = Number(payload.replace('.','').replace(',','.')).toFixed(2)
        },
        commitFormaDePagamento(state,payload){
            state.dadosPedido.formasDePagamento = payload
        },
        commitDadosPedido(state, payload){          
            console.log(state.dadosPedido)
            console.log(payload)

            state.dadosPedido = payload;

            setTimeout(()=>{
                state.dadosPedido = payload;
            },1)           

            setTimeout(()=> {  
                var especies = payload.formasDePagamento
                // :value="especies.findIndex((i) => i.id == especie.id) >= 0 ? especies[especies.findIndex((i) => i.id == especie.id)].valor : null" 
              
              var g =  state.dadosPedido.formasDePagamento.map((u, i, a) => u.id ==  especies.map(e, s, l)   )

                console.log(g)
            }, 100)

        },
        gravarPedido(state, payload){
            var obj = {}
            console.log(state.dadosPedido)
            obj = state.dadosPedido 

            axios.post(window.location.href.split('/')[0] + '//' + window.location.hostname+':8000' + '/home/pedido/gravar', {data:obj}).then(response => {response})
            // window.location.href = 'http://localhost:8000/home/pedido'
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

        },
        setAlterarDetalheDeValores({commit}, payload){
            var obj={};
            obj.acrescimo = Number(payload.acrescimo.replace('.','').replace(',','.')).toFixed(2)
            obj.desconto = Number(payload.desconto.replace('.','').replace(',','.')).toFixed(2)
            commit('alterarDetalheDeValores', obj)
        },
        setValorFrete({commit}, payload){
            commit('commitValorFrete', payload)
        },
        setTipoFrete({commit}, payload){
            if(payload.cobranca == "0"){
                payload.valor = '0.00'
            }else{
                payload.valor = Number(payload.valor.replace('.','').replace(',','.')).toFixed(2)
            }
            commit('commitTipoFrete', payload)
        },
        setformasDePagamento({commit}, payload){
            // var especie = {}
            // this.$http.get('/api/especies').then(res => {especie = res.data})
            // commit('commitFormaDePagamento', especie)
        },
        setDadosPedido({commit}, payload){
            // console.log(payload)

            commit('commitDadosPedido', payload)
        },     

    }
})
