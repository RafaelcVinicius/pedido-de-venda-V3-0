<template>
  <div class="component-sec">
      <div class="div-grup">
          <h5 class="titulo-grupo">Dados do cliente</h5>
          <div class="div-flex">  
                <fieldset class="cl-4">
                    <legend><label for="vendedor">Vendedor</label></legend>  
                    <input type="text" v-model="vendedor" name="vendedor" id="vendedor">
                </fieldset>
                <fieldset class="cl-3">
                    <legend><label for="data">Data</label></legend>  
                    <input type="date" v-model="data" name="data" id="data">
                </fieldset>
                
                <PedidoStatus />

            </div>
            <div class="div-flex-start">  
                <fieldset class="cl-4">
                    <legend><label for="vendedor">Cliente</label></legend>  
                    <input type="text" v-model="cliente" name="cliente" id="cliente">
                    <i  class="i-btn" @click.prevent="consultarCep"><svg width="18px" height="18px" viewBox="0 0 2117 2117"><g id="Camada_x0020_1"><path d="M1360 1499c-148,118 -330,181 -520,181 -463,0 -840,-377 -840,-840 0,-463 377,-840 840,-840 463,0 840,377 840,840 0,190 -63,372 -181,520l589 588c38,39 38,101 0,140 -19,18 -44,29 -70,29 -26,0 -51,-11 -70,-29l-588 -589zm-520 -16c355,0 643,-288 643,-643 0,-354 -288,-643 -643,-643 -354,0 -643,289 -643,643 0,355 289,643 643,643z" class="fillButton"></path></g></svg></i>
                </fieldset>
                <fieldset class="cl-3">
                    <legend><label for="data">CNPJ/CPF</label></legend>  
                    <input type="text" v-model="cnpjcpf" name="cnpjcpf" id="cnpjcpf">
                </fieldset>
            </div>
            <div class="div-flex-start">  
               <fieldset class="cl-4">
                    <legend><label for="vendedor">Cliente</label></legend>  
                    <input type="text" v-model="cliente" name="cliente" id="cliente">
                </fieldset>
          </div>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>