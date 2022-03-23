<template>
    <div class="component">
        <DadosCliente  />
        <DadosProdutos  v-show="viewProduto"/>
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
        }
    }
}
</script>

<style>

</style>