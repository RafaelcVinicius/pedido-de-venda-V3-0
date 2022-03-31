<template>
    <div class="component">
        <DadosCliente  />
        <DadosProdutos v-show="viewProduto"/>
        <DetalhesDoPedido v-show="viewDetalhesPedido"/>
        <FormaDePagamento v-show="viewDetalhesPedido" :especiesdefault="especiesdefault" />
    </div>
</template>

<script>
export default {
    props:{
        vendedor:String,
        idvendedor:Number,
        dados:Object,
    },
    data(){
        return{
            especiesdefault: []
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
        this.$http.get('/api/especies').then(res => { this.especiesdefault = this.$store.dispatch('setformasDePagamento', res.data)})
                // this.$http.get('/api/especies').then(res => { this.especiesdefault = res.data})       
        this.$store.commit('commitVendedor', {nome:this.vendedor, id:this.idvendedor})

        if(this.dados.idPedido > 0){
        //    this.dados.idPedido
            this.$store.dispatch('setDadosPedido', this.dados)

            if(this.dados.itens.length > 0){
                this.$store.state.displayProduto        = true
                this.$store.state.displayDetalhesPedido = true
            }else{
               
            }
          
        }
    }
}
</script>

<style>
</style>