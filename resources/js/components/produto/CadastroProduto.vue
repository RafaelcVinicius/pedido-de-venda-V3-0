<template>
    <div class="component">
        <div class="div-grup">
            <h4 class="titulo-grupo">Informações</h4>
            <div class="div-flex">
                <fieldset class="cl-5">
                    <legend><label for="nome">Nome</label></legend>  
                    <input v-model="nome " class="div-absolut" type="text" name="nome" id="nome">
                </fieldset>

                <fieldset class="cl">
                    <legend><label for="codbarras">Código de baras</label></legend>  
                    <input autocomplete="off" v-model="codbarras" class="div-absolut inp-w" type="text" name="codbarras" id="codbarras">
                    <i @click.prevent="geradorCodigoDeBarras" class="i-btn"><svg class="t-ms" xml:space="preserve" width="25px" height="25px" viewBox="0 0 4233 2954"><g id="Camada_x0020_1"><path d="M109 0l0 0 981 0c60,0 109,49 109,109l0 0c0,60 -49,109 -109,109l-872 0 0 872c0,60 -49,109 -109,109l0 0c-60,0 -109,-49 -109,-109l0 -981 0 -3 0 -3 0 -2 0 0 1 -3 0 0 0 -3 0 -3 1 -2 0 -3 1 -3 0 -2 1 -3 0 0 1 -2 1 -3 0 0 1 -2 1 -3 0 0 1 -2 0 0 1 -3 1 -2 1 -3 0 0 1 -2 0 0 1 -2 1 0 1 -2 1 -3 2 -2 0 0 1 -2 2 -2 0 0 1 -2 0 0 2 -2 2 -2 0 0 1 -2 2 -2 2 -2 0 0 2 -2 2 -2 2 -1 0 0 2 -2 2 -2 0 0 2 -1 0 0 2 -2 2 -1 0 0 2 -2 3 -1 2 -1 0 -1 2 -1 0 0 2 -1 0 0 3 -1 2 -1 3 -1 0 0 2 -1 0 0 3 -1 2 -1 0 0 3 -1 2 -1 0 0 3 -1 2 0 3 -1 3 0 2 -1 3 0 3 0 0 0 3 -1 0 0 2 0 3 0 3 0zm3906 2736l-871 0c-60,0 -109,49 -109,109l0 0c0,60 49,109 109,109l980 0 0 0 3 0 3 0 3 0 0 0 2 -1 0 0 3 0 3 0 3 -1 2 0 3 -1 2 0 3 -1 0 0 3 -1 2 -1 0 0 3 -1 2 -1 0 0 3 -1 0 0 2 -1 2 -1 3 -1 0 0 2 -1 0 0 2 -1 0 0 3 -2 2 -1 2 -2 0 0 2 -1 2 -2 0 0 3 -1 0 0 2 -2 2 -2 0 0 2 -1 1 -2 2 -2 0 0 2 -2 2 -2 2 -2 0 0 1 -2 2 -2 0 0 2 -2 0 0 1 -2 2 -2 0 0 1 -2 1 -3 2 -2 0 0 1 -2 0 0 1 -2 0 0 2 -3 1 -2 1 -3 0 0 1 -2 0 0 1 -3 1 -2 0 0 0 -3 1 -2 0 0 1 -3 1 -2 0 -3 1 -3 0 -2 0 -3 1 -3 0 0 0 -3 0 0 0 -2 0 -3 0 -3 0 -981c0,-59 -49,-109 -109,-109l0 0c-60,0 -109,50 -109,109l0 872zm-3797 0l872 0c60,0 109,49 109,109l0 0c0,60 -49,109 -109,109l-981 0 0 0 -3 0 -3 0 -2 0 0 0 -3 -1 0 0 -3 0 -3 0 -2 -1 -3 0 -3 -1 -2 0 -3 -1 0 0 -2 -1 -3 -1 0 0 -2 -1 -3 -1 0 0 -2 -1 0 0 -3 -1 -2 -1 -3 -1 0 0 -2 -1 0 0 -2 -1 0 0 -2 -2 -3 -1 -2 -2 0 0 -2 -1 -2 -2 0 0 -2 -1 0 0 -2 -2 -2 -2 0 0 -2 -1 -2 -2 -2 -2 0 0 -2 -2 -2 -2 -1 -2 0 0 -2 -2 -2 -2 0 0 -1 -2 0 0 -2 -2 -1 -2 0 0 -2 -2 -1 -3 -1 -2 -1 0 -1 -2 0 0 -1 -2 0 0 -1 -3 -1 -2 -1 -3 0 0 -1 -2 0 0 -1 -3 -1 -2 0 0 -1 -3 -1 -2 0 0 -1 -3 0 -2 -1 -3 0 -3 -1 -2 0 -3 0 -3 0 0 -1 -3 0 0 0 -2 0 -3 0 -3 0 -981c0,-59 49,-109 109,-109l0 0c60,0 109,50 109,109l0 872zm46 -1036l0 0c0,-23 18,-41 41,-41l3624 0c22,0 41,18 41,41l0 0c0,22 -19,41 -41,41l-3624 0c-23,0 -41,-19 -41,-41zm3548 -1259l45 0 0 1087 -45 0 0 -1087zm-356 0l210 0 0 1087 -210 0 0 -1087zm-286 0l141 0 0 1087 -141 0 0 -1087zm-227 0l81 0 0 1087 -81 0 0 -1087zm-237 0l92 0 0 1087 -92 0 0 -1087zm-193 0l47 0 0 1087 -47 0 0 -1087zm-287 5l142 0 0 1087 -142 0 0 -1087zm-228 -5l83 0 0 1087 -83 0 0 -1087zm-283 0l137 0 0 1087 -137 0 0 -1087zm-188 0l42 0 0 1087 -42 0 0 -1087zm-230 0l84 0 0 1087 -84 0 0 -1087zm-226 0l80 0 0 1087 -80 0 -4 0 -136 0 0 -1087 136 0 4 0zm-502 0l216 0 0 1087 -216 0 0 -1087zm-192 0l46 0 0 1087 -46 0 0 -1087zm3435 1431l45 0 0 638 -45 0 0 -638zm-356 0l210 0 0 638 -210 0 0 -638zm-286 0l141 0 0 638 -141 0 0 -638zm-227 0l81 0 0 638 -81 0 0 -638zm-237 0l92 0 0 638 -92 0 0 -638zm-193 0l47 0 0 638 -47 0 0 -638zm-287 3l142 0 0 638 -142 0 0 -638zm-228 -3l83 0 0 638 -83 0 0 -638zm-283 0l137 0 0 638 -137 0 0 -638zm-188 0l42 0 0 638 -42 0 0 -638zm-230 0l84 0 0 638 -84 0 0 -638zm-226 0l80 0 0 638 -80 0 -4 0 -136 0 0 -638 136 0 4 0zm-502 0l216 0 0 638 -216 0 0 -638zm-192 0l46 0 0 638 -46 0 0 -638zm3638 -1654l-871 0c-60,0 -109,-49 -109,-109l0 0c0,-60 49,-109 109,-109l980 0 0 0 3 0 3 0 3 0 0 0 2 1 0 0 3 0 3 0 3 1 2 0 3 1 2 0 3 1 0 0 3 1 2 1 0 0 3 1 2 1 0 0 3 1 0 0 2 1 2 1 3 1 0 0 2 1 0 0 2 1 0 1 3 1 2 1 2 2 0 0 2 1 2 2 0 0 3 1 0 0 2 2 2 2 0 0 2 1 1 2 2 2 0 0 2 2 2 2 2 2 0 0 1 2 2 2 0 0 2 2 0 0 1 2 2 2 0 0 1 2 1 3 2 2 0 0 1 2 0 0 1 2 0 0 2 3 1 2 1 3 0 0 1 2 0 0 1 3 1 2 0 0 0 3 1 2 0 0 1 3 1 2 0 3 1 3 0 2 0 3 1 3 0 0 0 3 0 0 0 2 0 3 0 3 0 981c0,60 -49,109 -109,109l0 0c-60,0 -109,-49 -109,-109l0 -872z" class="fillbutton"></path></g></svg></i>
                </fieldset>
            </div>
            <div class="div-flex">
                <fieldset class=" cl-4">
                    <legend><label for="referencia">Referencia</label></legend>  
                    <input autocompleteDadosTabela="off" v-model="referencia" class="div-absolut" type="text" name="referencia" id="referencia">
                </fieldset>

                <div class="div-relativ cl-3">
                    <fieldset @click.prevent="ativarDisplayAplicacao" class="div-relativ-fild" :class="{fieldsetativo: displayAplic}">
                        <legend><label for="aplicacao">Aplicação</label></legend>  
                        <input  readonly="readonly" v-model="Aplicacao.nome" class="div-absolut inp-w" type="text" name="aplicacao" id="aplicacao">
                        <input v-model="Aplicacao.id" type="hidden" name="id_aplicacao">
                        <i class="i-btn" :class="{fieldsetativo: displayAplic}" ><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                    </fieldset>
                    <ul v-show="displayAplic" class="lista">
                        <li @click.prevent="definirAplicacao(aplicacao)" v-for="(aplicacao, i) in listaAplicacao" :key="i" >{{aplicacao.nome}}</li>
                    </ul>
                </div>
                
                <div class="div-relativ cl">
                    <fieldset @click.prevent="ativarDisplayUn" class="div-relativ-fild" :class="{fieldsetativo: displayUn}">
                        <legend><label for="unidade">Unidade comercial</label></legend>  
                        <input  readonly="readonly" v-model="Uncomercial.nome" class="div-absolut inp-w" type="text" name="unidade" id="unidade">
                        <input v-model="Uncomercial.id"  type="hidden" name="id_unidade">
                        <i class="i-btn" :class="{fieldsetativo: displayUn}" ><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                    </fieldset>
                    <ul v-show="displayUn" class="lista">
                        <li @click.prevent="definirUncomercial(un)" v-for="(un, i) in listaUn" :key="i" >{{un.nome}}</li>
                    </ul>
                </div>
            </div>              
        </div>
        <div class="div-grup">    
            <h4 class="titulo-grupo" >Quantidades/Valores</h4>   
            <div class="div-flex">
                <fieldset class=" cl">
                    <legend><label for="qtde">Quantidade</label></legend>
                    <input autocomplete="off" v-model="qtde" class="div-absolut" type="text" name="qtde" id="qtde">
                </fieldset>

                <fieldset class="cl" >
                    <span v-show="disErroPrecocusto" class="erro">{{menssageErro}}</span>
                    <legend><label for="precocusto">Preço de custo (R$)</label></legend>
                    <!-- <input  v-model="precocusto" @blur="calcPrecoVenda" class="div-absolut " name="precocusto" id="precocusto"> -->
                    <money class="div-absolut" type="text" id="precocusto"  @blur.native="calcPrecoVenda" v-model="precocusto" name="precocusto"  v-bind="money">{{precocusto}}</money>
                </fieldset>

                <fieldset class="cl">                
                    <span v-show="disErroPrecovenda" class="erro">{{menssageErro}}</span>
                    <legend><label for="precovenda">Preço de Venda (R$)</label></legend>
                    <!-- <input placeholder="0,00"   v-model="precovenda" @blur="calcPorcLucro" class="div-absolut zin" type="text" name="precovenda" id="precovenda"> -->
                    <money class="div-absolut" type="text" v-model="precovenda" @blur.native="calcPorcLucro" name="precovenda"  v-bind="money">{{precocusto}}</money>
                </fieldset>

                <fieldset class="cl">
                    <legend><label for="porclucro">Lucro unitario (%)</label></legend>
                    <!-- <input placeholder="0,00" v-model="porclucro" @blur="calcPrecoVenda" class="div-absolut zin" type="text" name="porclucro" id="porclucro"> -->
                    <money class="div-absolut" type="text" v-model="porclucro" @blur.native="calcPrecoVenda" name="porclucro"  v-bind="money">{{precocusto}}</money>
                </fieldset>
            </div>    
        </div>    
    </div>
</template>

<script>
export default {
    data(){
        return{
            displayAplic:false,
            displayUn:false,
            Aplicacao:{
                nome: "MERCADORIA PARA REVENDA",
                id:1
                },
            Uncomercial:{
                nome:"UN",
                id:1
                },
            listaUn:{},
            listaAplicacao:{},
            nome:'',
            codbarras:'',
            referencia:'',
            qtde:'',
            precocusto:'',
            precovenda:'',
            porclucro:'',
            menssageErro:'',
            timerErro:10000,
            disErroPrecocusto:false,
            disErroPrecovenda:false,
            money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
                masked: false,
            }
        }
    },
   watch:{
      money(){

      } 
   },
    methods:{
        calcPorcLucro(){
            var valor = parseFloat(((this.precovenda / this.precocusto) - 1) * 100)
            this.porclucro =  parseFloat(valor.toFixed(2))
        },
        calcPrecoVenda(){
            var valor =  parseFloat(this.precocusto * (( this.porclucro / 100) +1))
            this.precovenda =  parseFloat(valor.toFixed(2))
        },
        definirUncomercial(valor){
            this.Uncomercial.nome = valor.nome
            this.Uncomercial.id = valor.id
            this.displayUn = false
        },
        definirAplicacao(valor){
            this.Aplicacao.nome = valor.nome
            this.Aplicacao.id = valor.id
            this.displayAplic = false
        },
        ativarDisplayUn(){
            console.log('f')
            this.displayUn = !this.displayUn
             this.displayAplic = false
        },
        ativarDisplayAplicacao(){
            this.displayAplic = !this.displayAplic            
            this.displayUn = false
        },
        geradorCodigoDeBarras(){
            let codigo =  Math.floor(Math.random() * 999999999 + 1000000000)
            this.codbarras = '200'+codigo
        }
    },
    created(){
        this.$http.get('/api/consultaun').then(res => { this.listaUn = res.data })   
        this.$http.get('/api/consultaaplicaca').then(res => { this.listaAplicacao = res.data })    
    }
}



</script>

<style scoped>
 
</style>