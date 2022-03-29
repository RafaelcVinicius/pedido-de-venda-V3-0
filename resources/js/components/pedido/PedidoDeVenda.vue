<template>
    <div class="component">
        <DadosCliente  />
        <DadosProdutos v-show="viewProduto"/>
        <DetalhesDoPedido v-show="viewDetalhesPedido"/>
        <FormaDePagamento v-show="viewDetalhesPedido"/>
    </div>
</template>

<script>
export default {
    props:{
        vendedor:String,
        idvendedor:Number,
        dadospedido:Object,
    },
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
        },
        viewDetalhesPedido(){
            return this.$store.state.displayDetalhesPedido
        },
    },
    watch:{
        viewEditProduto(){
           if(this.$store.state.displayEditarProduto === true){
                window.document.body.style =  'overflow:hidden;'
                // var topstyle = window.window.scrollY
                // window.document.getElementById('editarcom').style = 'top:'+topstyle+'px;'
                
            }else{
                window.document.body.style =  ''
            }
        }
    },
    created(){
        this.$store.commit('commitVendedor', {nome:this.vendedor, id:this.idvendedor})
        if(this.dadospedido != null){
             this.$store.state.dadosPedido = this.dadospedido
            if(this.dadospedido.itens == null){

            }else{
                this.$store.state.displayProduto        = true
                this.$store.state.displayDetalhesPedido = true
            }
        }
    }
}
</script>

<style>
</style>