<template>
    <div class="component">
        <DadosCliente  />
        <DadosProdutos v-show="viewProduto"/>
        <DetalhesDoPedido v-show="viewProduto"/>
        <FormaDePagamento v-show="viewProduto"/>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    computed:{
        viewProduto(){
            return this.$store.state.displayProduto
        },
        viewEditProduto(){
            return this.$store.state.displayEditarProduto
        }
    },
    watch:{
        viewEditProduto(){
           if(this.$store.state.displayEditarProduto === true){
                window.document.body.style =  'overflow:hidden;'
                var topstyle = window.window.scrollY
                window.document.getElementById('editarcom').style = 'top:'+topstyle+'px;'
                
            }else{
                window.document.body.style =  ''
            }
        }
    }
}
</script>

<style>
</style>