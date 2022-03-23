<template>
    <div class="component-editar">
        <div class="opacity" @click="fechardisplay">            
        </div>
        <div class="editar">
            <div class="editheader">
                <h5>Inclusão de produto</h5>
            </div>
            <div class="editbody">
                <div class="div-flex">   
                    <fieldset class="cl-7">
                        <legend><label for="data">Quantidade</label></legend>  
                        <input type="text" autocomplete="off" v-model="quantidade" name="quantidade" id="quantidade">
                    </fieldset>   
                </div>   
                <div class="div-flex">   
                    <fieldset class="cl-7">
                        <legend><label for="valor">Valor un.(R$)</label></legend>  
                        <input type="text" autocomplete="off" v-model="valor" name="valor" id="valor">
                    </fieldset>   
                </div>   
                <div class="div-flex">   
                    <fieldset class="cl-7">
                        <legend><label for="desconto">Desconto(%)</label></legend>  
                        <input type="text" autocomplete="off" v-model="desconto" name="desconto" id="desconto">
                    </fieldset>   
                </div>   
                <div class="div-flex">   
                    <fieldset class="cl-7">
                        <legend><label for="acrescimo">Acréscimo(%)</label></legend>  
                        <input type="text" autocomplete="off" v-model="acrescimo" name="acrescimo" id="acrescimo">
                    </fieldset>   
                </div>                  
            </div>
            <div class="div-flex-footer">   
                <div class="btns">
                    <button @click="fechardisplay" >Cancelar</button>
                    <button>Gravar</button>
                </div>
            </div>   
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            
        }
    },
    methods:{
        fechardisplay(){
           this.$store.commit('showDisplayEditarProduto', true)
        }
    }
}
</script>

<style scoped>
    .editheader h5{
        font-size: 25px;
        font-weight: 400;
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
        flex: 0 0 89.0000%;
        max-width: 89.000%;
    }
    .div-flex-footer{
        margin: 1rem 1.5rem ;
        display: flex;
        justify-self: flex-end;
        width: 100%;
        flex-wrap: wrap;
        column-gap: 1rem;
        justify-content: flex-start;
    }
    .btns{
        display: flex;
        max-width: 450px;
        width: calc(100% - 40px);
        justify-content: space-between;
    }
    .btns button{
        background-color: #009cf7;
        width: 200px;
        height: 45px;
        border-radius: 25px;
        color: white;
        font-size: 16px;
    }
</style>