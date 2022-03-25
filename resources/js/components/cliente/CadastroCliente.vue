<template>
    <div class="component">
        <div class="div-grup">
            <h5 class="titulo-grupo">Dados do cliente</h5>
            
            <div class="div-flex">  
                <fieldset class="cl">
                    <legend><label for="cnpjcpf">CNPJ/CPF</label></legend>  
                    <input type="text" v-model="cnpjcpf"  v-mask="maskcnpjcpf" name="cnpjcpf" id="cnpjcpf">
                </fieldset>

                <fieldset class="cl-6">
                    <legend><label for="nome">Nome</label></legend>  
                    <input type="text" name="nome" id="nome">
                </fieldset>                                            
            </div>
            <div class="div-flex mr-3">  
                <fieldset class="cl">
                    <legend><label for="telefone">Telefone</label></legend>
                    <input type="text" v-model="telefone" v-mask="'(##) #-####-#####'" name="telefone" id="telefone">
                </fieldset>
                <fieldset class="cl-6">
                    <legend><label for="telefone">E-mail</label></legend>
                    <input type="email" name="email" id="email">
                </fieldset>
            </div>
        </div>
        <div class="div-grup">
            <h5 class="titulo-grupo">Dados do endereço</h5>
            
            <div class="endereco div-flex">
                <span v-show="erroApi" class="erro" >* CEP Não encontrado</span>
                <fieldset class="input cep cl-3">
                    <legend><label for="cep">CEP</label></legend>
                    <input v-model="consultaCep" v-mask="'#####-###'"  type="text" name="cep" id="cep">
                    <i  class="i-btn" @click.prevent="consultarCep"><svg width="18px" height="18px" viewBox="0 0 2117 2117"><g id="Camada_x0020_1"><path d="M1360 1499c-148,118 -330,181 -520,181 -463,0 -840,-377 -840,-840 0,-463 377,-840 840,-840 463,0 840,377 840,840 0,190 -63,372 -181,520l589 588c38,39 38,101 0,140 -19,18 -44,29 -70,29 -26,0 -51,-11 -70,-29l-588 -589zm-520 -16c355,0 643,-288 643,-643 0,-354 -288,-643 -643,-643 -354,0 -643,289 -643,643 0,355 289,643 643,643z" class="fillButton"></path></g></svg></i>
                </fieldset> 


                <div class="div-relativ cl-2">
                    <fieldset @click.prevent="displayUF = !displayUF" :class="{displayUFclass: displayUF}" class="input  uf">
                        <legend><label for="uf">UF</label></legend>
                        <input readonly="readonly" v-model="apiCep.uf" type="text" name="uf" id="UF">
                        <i :class="{displayUFclass: displayUF}" class="i-btn" ><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                    </fieldset> 
                    <ul v-show="displayUF" class="listauf">
                        <li @click.prevent="definirUF(uf)" v-for="(uf, i) in ufs" :key="i">{{uf.uf}}</li>
                    </ul>
                </div>


                <div class="div-relativ cl">
                    <!-- <span v-show="erroCidade" class="erro" >* Por favor informe sua UF</span> -->
                    <fieldset  @click.prevent="displayCidade = !displayCidade" :class="{displayCidadeclass: displayCidade}" class="input cl">
                        <legend><label for="municipio">Município</label></legend>
                        <input readonly="readonly" v-model="apiCep.localidade" type="text" name="municipio" id="municipio">
                        <i class="i-btn" :class="{displayCidadeclass: displayCidade}"><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                    </fieldset>
                    <ul v-show="displayCidade" class="listacidade">
                        <li @click.prevent="definirCidade(cidade)" v-for="(cidade, i) in cidades" :key="i">{{cidade.nome}}</li>
                    </ul>
                </div>
            </div>
            <div class="div-flex">  
                <fieldset class="input cl-6">
                    <legend><label for="endereco">Endereço</label></legend>
                    <input v-model="apiCep.logradouro" type="text" name="endereco" id="endereco">
                </fieldset>
                <fieldset class="input  cl">
                    <legend><label for="numero">Nº</label></legend>
                    <input type="text" name="numero" id="numero">
                </fieldset>
            </div>
            <div class="div-flex">  
                <fieldset class="input cl-4">
                    <legend><label for="bairro">Bairro</label></legend>
                    <input v-model="apiCep.bairro" type="text" name="bairro" id="bairro">
                </fieldset>  
                
                <fieldset class="input cl">
                    <legend><label for="complemento">Complemento</label></legend>
                    <input v-model="apiCep.complemento" type="text" name="complemento" id="complemento">
                </fieldset>
            </div>
        </div>
    </div>    
</template>


<script>
export default {
    data(){
        return{
            telefone:"",
            maskcnpjcpf:"",
            erroApi:false,
            erroCidade:false,
            displayUF:false,
            displayCidade:false,
            consultaCep:'',
            apiCep:{
                bairro: "",
                cep: "",
                complemento: "",
                ddd: "",
                gia: "",
                ibge: "",
                localidade: "",
                logradouro: "",
                siafi: "",
                uf: "",
            },
            ufs:[],
            cidades:{},
            cnpjcpf:"",
        }
    },
    methods:{
        consultarCep(){
            this.apiCep ={ cep: ""}
            this.$api.get('/ws/'+this.consultaCep+'/json/').then(res => { this.apiCep = res.data, this.setState}).catch(error => {
                this.erroApi = true
                setTimeout(()=> {
                    this.erroApi = false  
                    }, 10000)
                })                    
        },
        definirUF(uf){
            this.apiCep.uf = uf.uf
            this.displayUF = false
            this.apiCep.localidade = ""
            this.$http.post('/api/consultacidadesuf', {
                idcidade: uf.id, 
               }
                ).then(res => { this.cidades = res.data })    
        },
        definirCidade(cidade){
            this.apiCep.localidade = cidade.nome

            this.displayCidade = false
        }
    },
    created(){
         this.$http.get('/api/consultauf').then(res => { this.ufs = res.data })    
    },
    watch:{
        displayUF(){
            if(this.displayUF == true){
                this.displayCidade = false
            }
        },
        displayCidade(){
            if(this.displayCidade == true){
                this.displayUF = false
            }

            if(this.apiCep.uf == ""){
                this.erroCidade = true
                setTimeout(() => {
                    this.erroCidade = false  
                }, 10000);
                this.displayCidade = false
            }
        },
        cnpjcpf(){
            let  t = this.cnpjcpf
            t = t.replace(/[^0-9]/g,'');
            if(t.length <= 11){
                this.maskcnpjcpf = '###.###.###-##'
            }else{
                this.maskcnpjcpf = '##.###.###/####-##'
            }
        },
    },    
}
</script>

<style scoped>

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
    background: white;        
    }

    ::-webkit-scrollbar-thumb {
        background-color: #03202e;    
        border-radius: 20px;       
        border: 3px solid white;  
    }
   .erro{
        color: red;
        position: absolute;
        font-size: 14px;
        top:70px;
        left: 40px;
        z-index: 8;
    }
    .displayCidadeclass{
         border-bottom-right-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
        border-bottom:0px solid white !important;  
    }
    .displayUFclass{
        border-bottom-right-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
        border-bottom:0px solid white !important;  
    }
    .listauf{
        position: absolute;
        top: 53px;
        z-index: 10;
        width: calc(100% - 1.5px);
        height: 250px;
        overflow-y: scroll;
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        border-left: 1px solid rgba(0, 0, 0, 0.3);
        border-right: 1px solid rgba(0, 0, 0, 0.3);
    }
    .listauf li{
        font-size: 15px;
        color: rgba(0, 0, 0, 0.75);
        list-style: none;
        padding: 6px;
        padding-left: 20px;
    }
    .listauf li:hover{
        background-color: rgb(0, 162, 255);
    }
    .listacidade{
        position: absolute;
        top:55px;
        z-index: 10;
        width: calc(100% - 1.5px);
        height: 250px;
        overflow:scroll;
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        border-left: 1px solid rgba(0, 0, 0, 0.3);
        border-right: 1px solid rgba(0, 0, 0, 0.3);
    }
    .listacidade li{
        font-size: 15px;
        color: rgba(0, 0, 0, 0.75);
        list-style: none;
        padding: 6px;
        padding-left: 20px;
    }
    .listacidade li:hover{
        background-color: rgb(0, 162, 255);
    }
    /* fieldset{
        color: rgba(0, 0, 0, 0.103);
    }
    
    .input{
        border: 1px solid rgb(0 0 0 / 26%) !important;
        margin: 10px !important;
    }
    input{
        font-size: 15px;
        height: 23px !important;
    }
    .form{
        display: flex;
        flex-wrap: wrap;
        max-width: 1280px;
        width: 100%;

        margin: 40px auto;
    }
    .cep{
        position: relative;
        max-width: 250px;
        width: 100%;
    }
    .cep input{
       position: absolute;
       left: 20px;
    }
    .cep i{
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        top:-9px;
        right: -5px;
        background-color: white;
        width: 50px;
        height: 47px;
        border-radius: 0 25px  25px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.30) !important;        
        border-bottom: 1px solid rgba(0, 0, 0, 0.30) !important;        
        border-right: 1px solid rgba(0, 0, 0, 0.305) !important;  
    }
    .uf{
        max-width: 150px;
        width: calc(100% - 35px);
    }
    .uf input {
        max-width: 65px;
        position: absolute;
        left: 20px;       
    }
    .input i {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 46px;
        height: 41px;
        top: -11px;
        right: -1px;
        background-color: rgb(255, 255, 255);
        border-radius: 0 25px 25px 0;
        border-top: 1px solid #0000003a;
        border-right: 1px solid #0000003a;
        border-bottom: 1px solid #0000003a;
      }
    .uf i svg{
        fill: rgba(0, 0, 0, 0.73);
    }
    .cep i svg{
        fill: rgba(0, 0, 0, 0.73);
    }
    .uf-relativ{
         position: relative;
        display: flex;
        justify-content: center;
    }
 
    .cidade-relativ{
        width: 100%;
        position: relative;
        display: flex;
        justify-content: center;
    }
    .cl-dis{
        flex: 0 0  43.7%;
        max-width: 42.8666666%;
    }
    
    .div-block{
        max-width: 1280px;
        width: 100%;
        display: flex;
        justify-content: flex-start;

        margin-top:10px ;
    }
    .mr-3{
        margin-bottom: 10px;
    }
    legend{
        margin-left: 20px;
        color: rgba(0, 0, 0, 1);
        font-size: 14px;
    }
    .input {
        height: 35px;
        border: 1px solid rgba(0, 0, 0, 0.74);
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        border-bottom-right-radius: 25px;
        border-bottom-left-radius: 25px;
        padding: 8px;
        background-color: none;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }
    .div-block h5{
        font-size: 21px;
        color: rgba(0, 0, 0, 0.85);
        font-weight: 500;
    } */

</style>