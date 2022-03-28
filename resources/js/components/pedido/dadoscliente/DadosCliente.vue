<template>
  <div class="component-sec">
      <div class="div-grup">
          <h5 class="titulo-grupo">Dados do cliente</h5>
          <div class="div-flex">  
                <fieldset class="none cl-4">
                    <legend><label for="vendedor">Vendedor</label></legend>  
                    <input type="text" readonly="readonly" v-model="vendedor.nome"  name="vendedor" id="vendedor">
                </fieldset>
                <fieldset class="cl-3">
                    <legend><label for="data">Data</label></legend>  
                    <input type="date" v-model="data" @blur="setData" name="data" id="data">
                </fieldset>                
                <PedidoStatus />
            </div>
            <div class="div-flex-start">                 
                <PesquisaPedidoCliente :legend="'cliente'" :estilo="'cl-4 component-ter'"/>
                <fieldset class="none cl-3">
                    <legend><label for="cnpjcpf">CNPJ/CPF</label></legend>  
                    <input type="text" readonly="readonly" v-model="dadosCliente.cnpjcpf" v-mask="dadosCliente.mask" name="cnpjcpf" id="cnpjcpf">
                </fieldset>
            </div>
            <div class="div-flex-start">  
               <fieldset class="cl-4">
                    <legend><label for="email">E-mail</label></legend>  
                    <input type="text" @blur="setEmail" v-model="email" name="email" id="email">
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
    methods:{
        setEmail(){
            console.log(this.email)
            this.$store.state.dadosPedido.email = this.email
        },
        setData(){
            this.$store.state.dadosPedido.previsaoEntrega = this.data
        }
    },
     created(){
        if(this.$store.state.dadosPedido.idPedido === 0){
            var data = new Date();
            var dia = String(data.getDate()).padStart(2, '0');
            var mes = String(data.getMonth() + 1).padStart(2, '0');
            var ano = data.getFullYear();
            var dataAtual = ano + '-' + mes + '-' + dia;
            console.log(dataAtual);
            this.data =  dataAtual
            this.$store.state.dadosPedido.previsaoEntrega = dataAtual
        }
     },
    computed:{
        dadosCliente(){               
            return this.$store.getters.cnpjcpfCliente
        },
        vendedor(){
          return  this.$store.state.dadosPedido.vendedor
        },
        getemail(){
          this.email =  this.$store.state.dadosPedido.email
        },
        getdata(){
          this.data =  this.$store.state.dadosPedido.previsaoEntrega
        }
    },
}
</script>

<style>

</style>