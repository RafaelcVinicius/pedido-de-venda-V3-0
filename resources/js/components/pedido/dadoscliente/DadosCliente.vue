<template>
  <div class="component-sec">
      <div class="div-grup">
          <h5 class="titulo-grupo">Dados do cliente</h5>
          <div class="div-flex">  
                <fieldset class="none cl-4">
                    <legend><label for="vendedor">Vendedor</label></legend>  
                    <input type="text" readonly="readonly" v-model="vendedor.nome" name="vendedor" id="vendedor">
                </fieldset>
                <fieldset class="cl-3">
                    <legend><label for="data">Data</label></legend>  
                    <input type="date" v-model="data" name="data" id="data">
                </fieldset>                
                <PedidoStatus />
            </div>
            <div class="div-flex-start">                 
                <PesquisaPedidoCliente :legend="'cliente'" :estilo="'cl-4 component-ter'"/>
                <fieldset class="none cl-3">
                    <legend><label for="cnpjcpf">CNPJ/CPF</label></legend>  
                    <input type="text" readonly="readonly" v-model="cnpjcpfCliente.cnpjcpf" v-mask="cnpjcpfCliente.mask" name="cnpjcpf" id="cnpjcpf">
                </fieldset>
            </div>
            <div class="div-flex-start">  
               <fieldset class="cl-4">
                    <legend><label for="email">E-mail</label></legend>  
                    <input type="text" v-model="email" name="email" id="email">
                </fieldset>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            data:'',
            email:'',           
        }
    },
    computed:{
        cnpjcpfCliente(){               
            return this.$store.getters.cnpjcpfCliente
        },
        vendedor(){
          return  this.$store.state.dadosPedido.vendedor
        }
    },
}
</script>

<style>

</style>