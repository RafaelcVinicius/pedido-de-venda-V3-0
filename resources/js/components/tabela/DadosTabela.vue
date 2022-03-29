<template>
    <div class="component"> 
        <div class="consulta-table">
            <fieldset v-show="vshow" class="cl-2">
                <legend><label for="pesquisa">Pesquisar</label></legend>  
                <input v-model="pesquisa" @keyup="pesquisadados" class="div-absolut" type="text" name="pesquisa" id="pesquisa">
            </fieldset>
        </div>
        <div class="div-tabela">
            <table>
                <thead>
                    <tr class="thead-tr">
                        <th class="cursorpointer" @click="ordenar('campo1')" ><slot name="thead-1"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo2')" ><slot name="thead-2"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo3')" ><slot name="thead-3"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo4')" ><slot name="thead-4"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo5')" ><slot name="thead-5"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo6')" ><slot name="thead-6"></slot></th>
                        <th class="cursorpointer" @click="ordenar('campo7')" ><slot name="thead-7"></slot></th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  v-for="(dados, i) in dadosTabelaComput" :key="i">
                        <td :class="{inativo: dados.campo7 == 0 }" >{{ Number(dados.campo1) }}</td>
                        <td v-if="url == 'pedido'" :class="{inativo: dados.campo7 == 0 }"> {{ dados.campo2.nome }}</td>
                        <td v-else :class="{inativo: dados.campo7 == 0 }"> {{ dados.campo2 }}</td>
                        <td v-if="url == 'clientes'" :class="{inativo: dados.campo7 == 0 }" >{{ dados.campo3 | cpfcnpj  }}</td>   
                        <td  v-else-if=" url == 'Pedido'"  >{{ strdados.campo3  }}</td>
                        <td  v-else :class="{inativo: dados.campo7 == 0 }" >{{ dados.campo3  }}</td>                        
                        <td v-if="url == 'pedido'" class="pedido" > <p :class="dados.campo4" >{{ dados.campo4 }}</p></td>
                        <td :class="{inativo: dados.campo7 == 0 }" v-else-if="url == 'clientes'">{{ dados.campo4 | fone }}</td>
                        <td :class="{inativo: dados.campo7 == 0 }" v-else>{{ dados.campo4 }}</td>
                        <td v-if="url == 'produtos'"  :class="{inativo: dados.campo7 == 0 }">{{ dados.campo5 | colocarvirgula }}</td>
                        <td v-else :class="{inativo: dados.campo7 == 0 }">{{ dados.campo5}}</td>
                        <td v-if="url == 'produtos'"  :class="{inativo: dados.campo7 == 0 }">{{ dados.campo6 | colocarvirgula}}</td>
                        <td v-else :class="{inativo: dados.campo7 == 0 }">{{ dados.campo6}}</td>
                        <td></td>
                        <td :class="{inativo: dados.campo4 == 'Cancelado' }"  class="borda-left"><span @click="edit(dados)" ><svg width="18px" height="18px" viewBox="0 0 4233 4233"><g id="Camada_x0020_1"><g id="_1913567360560"><path class="fill-blue" d="M454 4233l2721 0c251,0 454,-203 454,-453l0 -1512c0,-84 -68,-151 -152,-151 -83,0 -151,67 -151,151l0 1512c0,83 -67,151 -151,151l-2721 0c-84,0 -152,-68 -152,-151l0 -3024c0,-84 68,-151 152,-151l1814 0c83,0 151,-68 151,-151 0,-84 -68,-152 -151,-152l-1814 0c-251,0 -454,203 -454,454l0 3024c0,250 203,453 454,453z"></path><path class="fill-blue" d="M3850 774l-1965 1966 -588 196 196 -586 1966 -1966c108,-108 283,-108 391,0 52,52 81,122 81,195 0,73 -29,144 -81,195zm383 -193l0 -5c0,-147 -57,-294 -169,-406 -109,-109 -256,-170 -409,-170 -154,0 -301,61 -410,170l-1991 1991c-17,17 -29,37 -37,59l-302 907c-26,79 16,165 96,191 15,6 31,8 47,8 17,0 33,-2 48,-8l907 -302c23,-7 43,-20 59,-36l1992 -1992c112,-112 169,-259 169,-407z"></path></g></g></svg></span>
                        <span class="status" @click="status(dados.campo1)"><svg width="18px" height="18px" viewBox="0 0 443 357"><rect width="443" height="32.86" class="fill-blue"></rect> <rect y="324" width="443" height="32.86" class="fill-blue"></rect> <rect y="162" width="443" height="32.86" class="fill-blue"></rect></svg></span>
                        <div v-if="dados.campo4 != 'Cancelado'" @click="status" v-show="display == dados.campo1" class="opcoes">
                            <div v-if="url == 'pedido'">
                                <q/>
                                <span @click="cancelar" >Cancelar</span>
                                <span @click="finalizar" >Finalizar</span>
                                <span><a :href="pdf.replace('_ID_', dados.campo1)" target="_blank">Imprimir-A4</a></span>
                            </div>
                             <div v-else>
                                 <q/>
                                <span v-if="dados.campo7 == 1" @click="inativar" >Inativar</span>
                                <span v-else  @click="ativar" >Ativar</span>
                            </div>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import sortBy from "sort-by";
export default {
     components: {
        sortBy
    },
    props:{
        url:String,
        vshow:Boolean,
        editurl:String,
        pdf:String,
    },
    data(){
        return{
            pesquisa:'',
            timeout: null,
            display:null,            
        }
    },
    methods:{
        ordenar(chave){
            return this.$store.state.dadosTabela.sort(sortBy(chave))
        },
        pesquisadados(){
            clearInterval(this.timeout)
               this.timeout = setTimeout(() => {
                   this.consultaAxiox()
            }, 800);                   
        },
        consultaAxiox(){
            this.$http.post('/api/'+this.url+'where', {pesquisa: this.pesquisa }).then(res => {this.$store.commit('addRegistroTabela', res.data)})   
        },
        edit(dados){
            if(dados.campo4 != 'Finalizado' && dados.campo4 != 'Cancelado'){
                window.location.href = this.editurl.replace('_ID_', dados.campo1)
            }
        },
        status(id){
            if(this.display == id){
                this.display = null
            }else{
                this.display = id
            }
        },
        cancelar(){
            this.$http.put('home/pedido/'+this.display+'/status/', {
                    situacao: 'Cancelado'
                }).then(res =>{ this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data)})})
        },
        finalizar(){
            this.$http.put('home/pedido/'+this.display+'/status/', {
                    situacao: 'Finalizado'
                }).then(res => { this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data)})  } )  
        },
        inativar(){
            this.$http.put('home/'+this.url+'/'+this.display, {
                    status: true,
                    ativo: '0'
                }).then(res => { this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data)})  } )  
        },
        ativar(){
            this.$http.put('home/'+this.url+'/'+this.display, {
                    status: true,
                    ativo: '1'
                }).then(res => { this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data)})  } )  
        },
        gerarpdf(id){
         window.location.href = this.pdf.replace('_ID_', id);
        }
    },
    computed:{
        dadosTabelaComput(){
            return this.$store.state.dadosTabela
        }
    },
    created(){        
        this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data)})   
    },
}
</script>

<style scoped>
    .inativo{
        opacity: 0.5;
    }
    .inativo span svg{
        cursor:default;
        fill:rgba(0, 0, 0, 0.534) !important;
    }
    .pedido{
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-transform: uppercase;        
        font-size: 13px;
    }
    .Cancelado{
        background-color: rgb(228, 77, 77);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 25px;
        border-radius: 15px;
    }
    .Finalizado{
        background-color: rgb(61, 156, 61);
        display: flex;
        justify-content: center;
        align-items: center; 
        width: 100px;
        height: 25px;
        border-radius: 15px;
    }
    .Aberto{
        background-color: rgba(19, 19, 19, 0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 25px;
        border-radius: 15px;
    }
    .opcoes{
        position: relative;
    }
    .opcoes div{
        position: absolute;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        background-color: rgba(32, 32, 32, 0.8);
        border-radius: 5px;
        top: 4px;
        right: 5px;
        width: 250px;
        padding: 15px 0px;
    }
    .opcoes div span{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        color: white;
    }
    .opcoes div span:hover{
        background-color:rgb(49, 155, 255);
    }
    q::before {
        content: "";
        position: absolute;
        border: 7px solid transparent;
        border-bottom-color: rgba(3,32,46,.8784313725490196);
        bottom: 100%;
        right: 29px;
    }
</style>