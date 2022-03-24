<template>
    <div class="component">
        <div class="component-sec">
            <div class="div-grup">
                <h5 class="titulo-grupo">Observações do pedido</h5>
                <div class="div-flex">  
                    <fieldset class="cl textarea">
                        <textarea name="observacao" id="observacao"></textarea>
                    </fieldset>
                </div> 
            </div>                  
        </div>
        <div class="component-sec">
            <div class="div-grup">
                <h5 class="titulo-grupo">Forma de entrega</h5>
                    <div class="div-flex">  
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
                        <input  autocomplete="off" v-model="desconto" v-money="money" class="div-absolut" type="text" name="qtde" id="qtde">
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
        }
    },
    computed:{
        totalizadoresPedido(){
            return this.$store.getters.totalizadoresDoPedido
        },
        detalhamentoDeValores(){
                return this.$store.getters.detalhamentoValores
        }
    }
}
</script>

<style scoped>
    .component{
        margin-bottom: 0px;
    }
    .textarea{
        height: 150px;
        position: relative;
    }
    .textarea textarea{
        resize: none;
        margin: 1rem;
        height: calc(100% - 2rem);
        width: calc(100% - 2rem);
        outline: 0;
        font-size: 14px;
    }
</style>
