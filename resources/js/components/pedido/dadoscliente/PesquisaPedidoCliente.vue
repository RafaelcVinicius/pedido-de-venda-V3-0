<template>
    <div :class="estilo">
         <fieldset :class="{fieldsetativo: displaydados}" class="cl">
            <legend><label :for="legend">{{ this.legend }}</label></legend>  
            <input type="text" autocomplete="off" @keyup="consultar" v-model="dados" :name="legend" :id="legend">
            <i  :class="{fieldsetativo: displaydados}"  class="i-btn" ><svg width="18px" height="18px" viewBox="0 0 2117 2117"><g id="Camada_x0020_1"><path d="M1360 1499c-148,118 -330,181 -520,181 -463,0 -840,-377 -840,-840 0,-463 377,-840 840,-840 463,0 840,377 840,840 0,190 -63,372 -181,520l589 588c38,39 38,101 0,140 -19,18 -44,29 -70,29 -26,0 -51,-11 -70,-29l-588 -589zm-520 -16c355,0 643,-288 643,-643 0,-354 -288,-643 -643,-643 -354,0 -643,289 -643,643 0,355 289,643 643,643z" class="fillButton"></path></g></svg></i>
        </fieldset>
        <ul class="lista" v-show="displaydados">
            <li @click="definirCliente(dados)" v-for="(dados, i) in pesquisa" :key="i">{{dados.campo2}}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        legend:{
            type:String
        },
        estilo:{
            type:String
        }
    },
    data(){
        return{
            displaydados:false,
            pesquisa:{},
            timeout:null,
            dados:'',
        }
    },
    methods:{
        consultar(){
            clearTimeout(this.timeout)
               this.timeout = setTimeout(() => {
                   if(this.dados.length > 0){
                        this.displaydados = true
                        this.consultaAxiox()
                    }else{
                        this.displaydados = false
                        this.$store.dispatch('alterarCliente', false)
                        //fundção para desabilitar o produtos e limpara los
                    }
            }, 400);   
        },
        consultaAxiox(){
            this.$http.post('/api/'+this.legend+'swhere', {pesquisa: this.dados }).then(res => {this.pesquisa = res.data})   
        },
        definirCliente(dado){
            this.dados = dado.campo2
            this.displaydados = false
            this.$store.dispatch('alterarCliente', dado)
        }
    },
    created(){
        this.dados = this.$store.state.dadosPedido.cliente.nome
    }
}
</script>
<style scoped>
    legend:first-letter{
        text-transform: uppercase;
    }
</style>