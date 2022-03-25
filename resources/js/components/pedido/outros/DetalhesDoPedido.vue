<template>
    <div class="component">
        <div class="component-sec">
            <div class="div-grup">
                <h5 class="titulo-grupo">Observações do pedido</h5>
                <div class="div-flex">  
                    <fieldset class="cl textarea">
                        <textarea v-model="obsPedido" name="observacao" id="observacao"></textarea>
                    </fieldset>
                </div> 
            </div>                  
        </div>
        <div class="component-sec">
            <div class="div-grup">
                <h5 class="titulo-grupo">Forma de entrega</h5>
                <div class="div-flex-start">  
                    <div class="tipoentrega cl-3">
                        <fieldset :class="{fieldsetativo: displaydados}" class="cl">
                            <legend>Status</legend>
                            <input readonly="readonly" @click="displaydados = !displaydados" type="text" id="situacao" name="situacao" v-model="getFrete.tipo">
                            <i class="i-btn"  :class="{fieldsetativo: displaydados}" @click.prevent="displaydados = !displaydados"><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                        </fieldset>
                        <ul class="lista" v-show="displaydados">
                            <li @click="definirTipoFrete(dados)" v-for="(dados, i) in pesquisa" :key="i">{{dados.tipo}}</li>
                        </ul>   
                    </div>
                    <div class="valorfrete cl-2">                        
                        <fieldset v-if="getFrete.cobranca == '0' " class=" none cl">
                            <legend><label for="qtde">Valor frete(R$)</label></legend>
                            <input readonly autocomplete="off" v-model="valorFrete" v-money="money" class="div-absolut" type="text" name="qtde" id="qtde">
                        </fieldset> 
                        <fieldset v-else class=" cl">
                            <legend><label for="qtde">Valor frete(R$)</label></legend>
                            <input autocomplete="off" v-model="valorFrete" v-money="money" @blur="setvalorFrete" class="div-absolut" type="text" name="qtde" id="qtde">
                        </fieldset> 
                    </div>
                </div> 
            </div>
        </div>
        <div class="component-sec">
            <div class="div-grup">
                <h5 class="titulo-grupo">Detalhamento de valores</h5>
                <div class="div-flex">  
                    <fieldset class=" cl">
                        <legend><label for="qtde">Acréscimo(R$)</label></legend>
                        <input autocomplete="off" v-model="acrescimo" @blur="alterarValores" v-money="money" class="div-absolut" type="text" name="qtde" id="qtde">
                    </fieldset>

                    <fieldset class=" cl">
                        <legend><label for="qtde">Desconto(R$)</label></legend>
                        <input  autocomplete="off" v-model="desconto" @blur="alterarValores" v-money="money" class="div-absolut" type="text" name="qtde" id="qtde">
                    </fieldset>
                    <fieldset class="none cl">
                        <legend><label for="qtde">Total dos produtos(R$)</label></legend>
                        <input readonly="readonly" autocomplete="off" v-model="totalizadoresPedido.totalprodutos" v-money="money" class="div-absolut" type="text" name="totalprodutos" id="qtde">
                    </fieldset>

                    <fieldset class="none cl">
                        <legend><label for="valortotal">Valor total(R$)</label></legend>
                        <input readonly="readonly" autocomplete="off" v-model="totalizadoresPedido.valortotal" v-money="money" class="div-absolut" type="text" name="valortotal" id="qtde">
                    </fieldset>

                    <fieldset class="none cl">
                        <legend><label for="qtde">Total financeiro(R$)</label></legend>
                        <input readonly="readonly" autocomplete="off" v-model="totalizadoresPedido.valortotalfinaceiro" v-money="money" class="div-absolut" type="text" name="qtde" id="qtde">
                    </fieldset>                    
                </div> 
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            acrescimo:"0.00",
            desconto:"0.00",
            obsPedido:'',
            pesquisa:{},
            valorFrete:0,
            displaydados:false,
            money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
            },   
        }
    },
    methods:{
        alterarValores(){
            this.$store.dispatch('setAlterarDetalheDeValores', {acrescimo:this.acrescimo, desconto:this.desconto})
        },
        definirTipoFrete(dado){
            this.displaydados = false 
            dado.valor = this.valorFrete           
            this.$store.dispatch('setTipoFrete', dado)
        },
        setvalorFrete(){
            this.$store.commit('commitValorFrete', this.valorFrete)
            this.alterarValores()
        }
    },
    computed:{
        totalizadoresPedido(){
            return this.$store.getters.totalizadoresDoPedido
        },
        detalhamentoDeValores(){
            return this.$store.getters.detalhamentoValores
        },
        getObsPedido(){
            this.obsPedido = this.$store.state.obsPedido
        },
        getFrete(){
            this.tipoFrete = this.$store.getters.getFrete
            this.valorFrete = this.$store.getters.getFrete.valor
            return this.$store.getters.getFrete
        }
    },
    created(){
        this.$http.get('/api/formasentrega').then(res => {this.pesquisa = res.data})   
    }
}
</script>

<style scoped>
    .component{
        margin-bottom: 0px;
    }
    .tipoentrega{
        position: relative;
    }
</style>
