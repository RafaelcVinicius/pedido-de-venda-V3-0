<template>
    <div class="component-sec">
        <div class="div-grup">
            <h5 class="titulo-grupo">Dados do Produtos</h5>
            <div class="div-flex">  
                <PesquisaPedidoProduto :legend="'produto'" :estilo="'cl component-ter'" />
            </div> 
            <div class="div-flex">  
                <TabelaProdutos />
                <EditarProdutos v-show="vShow" />
            </div>                
        </div>    
    </div>
</template>

<script>
export default {
    computed:{
        vShow(){
            return this.$store.state.displayEditarProduto
        }
    }
}
</script>

<style>

</style>