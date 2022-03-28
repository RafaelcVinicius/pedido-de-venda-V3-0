<template>
    <div id="editarcom" class="component-editar">
        <div class="opacity" @click="fechardisplay">            
        </div>
        <div class="editar">
            <div class="editheader">
                <h5>Edição de produto</h5>
                <span>Editando o produto: {{produtos.nome}}</span>
            </div>
            <div class="editbody">
                <div class="div-flex cl-7">   
                    <fieldset class="cl">
                        <legend><label for="data">Quantidade</label></legend>  
                        <input type="text" autocomplete="off" v-model="produtos.qtde" v-money="money" name="quantidade" id="quantidade">
                    </fieldset>   
                </div>   
                <div class="div-flex cl-7">   
                    <fieldset class="cl">
                        <legend><label for="valor">Valor un.(R$)</label></legend>
                        <input type="text" autocomplete="off" v-model="produtos.valor" v-money="money" name="valor" id="valor">
                    </fieldset>   
                </div>   
                <div class="div-flex cl-7">
                    <fieldset class="cl">
                        <legend><label for="desconto">Desconto(%)</label></legend>  
                        <input type="text" autocomplete="off" v-model="produtos.desconto" v-money="money" name="desconto" id="desconto">
                    </fieldset>   
                </div>   
                <div class="div-flex  cl-7">   
                    <fieldset class="cl">
                        <legend><label for="acrescimo">Acréscimo(%)</label></legend>  
                        <input type="text" autocomplete="off" v-model="produtos.acrescimo" v-money="money" name="acrescimo" id="acrescimo">
                    </fieldset>   
                </div>                  
                <div class="div-flex cl-7">   
                    <fieldset class="cl textarea">
                        <legend>Observação do item</legend>
                        <textarea name="observacao" v-model="produtos.obs" id="observacao"></textarea>
                    </fieldset>
                </div>                  
            </div>
            <div class="div-flex-footer">   
                <div class="btns">
                    <button @click="fechardisplay" >Cancelar</button>
                    <button @click="alterar">Gravar</button>
                </div>
            </div>   
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
            }                
        }
    },
    methods:{
        fechardisplay(){
           this.$store.commit('showDisplayEditarProduto', false)
        },
        alterar(){
           this.$store.commit('showDisplayEditarProduto', false)
           this.$store.commit('commitAlteracoesProduto', true)            
        }
    },
    computed:{
        produtos(){
            return this.$store.state.itemEmEdicao
        }
    }
}
</script>
<style scoped>
    .component-editar{
        display: flex;
        position: fixed;
        left: 0px;
        width: 100%;
        height: 100%;
        overflow-y: hidden;
        overflow-x: hidden;
        z-index: 1000;
        top: 0;
    }
    .editheader h5{
        font-size: 25px;
        font-weight: 400;
        color: white;
    }
    .editheader span{
        color: white;
    }
    .editbody{  
        flex-direction: column;
    }
    .div-flex{
        margin: 1rem 1.5rem ;
        display: flex;
        max-width: 450px;
        width: 100%;
        flex-wrap: wrap;
        column-gap: 1rem;
        justify-content: flex-start;
    }
    .cl-7{
        max-width: 400px;
        width: 100%;
    }
    .div-flex-footer{
        display: flex;
        justify-self: flex-end;
        width: 100%;
        flex-wrap: wrap;
        column-gap: 1rem;
        justify-content: flex-start;
        background-color: white;
        box-shadow: 0 0 5px #ccc;
    }
    .btns{
        display: flex;
        margin: 1rem 1.5rem ;
        max-width: 450px;
        width: calc(100% - 40px);
        justify-content: space-between;
    }
    .btns button{
        background-color: #009cf7;
        width: 195px;
        height: 45px;
        border-radius: 25px;
        color: white;
        font-size: 16px;
    }
    input{
        text-align: end;
    }
</style>