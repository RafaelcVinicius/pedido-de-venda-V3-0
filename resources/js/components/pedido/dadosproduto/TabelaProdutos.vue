<template>
    <div class="component-ter"> 
        <div class="div-tabela">
            <table>
                <thead>
                    <tr class="thead-tr">
                        <th @click="ordenar('nome')" >Produto</th>
                        <th @click="ordenar('qtde')" >Qtde</th>
                        <th @click="ordenar('valor')" >Valor un. (R$)</th>
                        <th @click="ordenar('desconto')" >Desc. (%)</th>
                        <th @click="ordenar('acrescimo')" >Acrés. (%)</th>
                        <th >Total (R$)</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(dados, i) in listaDeProdutos" :key="i">
                        <td>{{ dados.nome }}</td>
                        <td>{{ Number(dados.qtde) }}</td>
                        <td>{{ Number(dados.valor) }}</td>
                        <td>{{ Number(dados.desconto) }}</td>
                        <td>{{ Number(dados.acrescimo) }}</td>
                        <td>{{valorTotalUn[i]}}</td>
                        <td class="borda-left"><span @click="editProduto(i)" ><svg width="18px" height="18px" viewBox="0 0 4233 4233"><g id="Camada_x0020_1"><g id="_1913567360560"><path class="fill-blue" d="M454 4233l2721 0c251,0 454,-203 454,-453l0 -1512c0,-84 -68,-151 -152,-151 -83,0 -151,67 -151,151l0 1512c0,83 -67,151 -151,151l-2721 0c-84,0 -152,-68 -152,-151l0 -3024c0,-84 68,-151 152,-151l1814 0c83,0 151,-68 151,-151 0,-84 -68,-152 -151,-152l-1814 0c-251,0 -454,203 -454,454l0 3024c0,250 203,453 454,453z"></path><path class="fill-blue" d="M3850 774l-1965 1966 -588 196 196 -586 1966 -1966c108,-108 283,-108 391,0 52,52 81,122 81,195 0,73 -29,144 -81,195zm383 -193l0 -5c0,-147 -57,-294 -169,-406 -109,-109 -256,-170 -409,-170 -154,0 -301,61 -410,170l-1991 1991c-17,17 -29,37 -37,59l-302 907c-26,79 16,165 96,191 15,6 31,8 47,8 17,0 33,-2 48,-8l907 -302c23,-7 43,-20 59,-36l1992 -1992c112,-112 169,-259 169,-407z"></path></g></g></svg></span>
                        <span @click="delProduto(i)"><svg width="18px" height="18px" viewBox="0 0 270 282"><g id="Camada_x0020_1"><path class="fill-blue-arrow" d="M29 78l212 0 0 0c5,0 10,-5 10,-10l0 0c0,-5 -5,-9 -10,-9l-50 0 -111 0 -51 0c-5,0 -9,4 -9,9l0 0c0,5 4,10 9,10l0 0 0 0zm64 50l0 0c5,0 10,5 10,10l0 83c0,6 -5,10 -10,10l0 0c-6,0 -10,-4 -10,-10l0 -83c0,-5 4,-10 10,-10zm85 0l0 0c5,0 10,5 10,10l0 83c0,6 -5,10 -10,10l0 0c-6,0 -10,-4 -10,-10l0 -83c0,-5 4,-10 10,-10zm-43 0l0 0c6,0 10,5 10,10l0 83c0,6 -4,10 -10,10l0 0c-5,0 -10,-4 -10,-10l0 -83c0,-5 5,-10 10,-10zm-55 -89l0 -11c0,-16 12,-28 27,-28l56 0c15,0 28,12 28,28l0 11 50 0c16,0 29,14 29,29l0 0c0,16 -13,29 -29,29l0 0 0 157c0,15 -12,28 -27,28l-157 0c-15,0 -28,-13 -28,-28l0 -157 0 0c-16,0 -29,-13 -29,-29l0 0c0,-15 13,-29 29,-29l51 0zm91 0l0 -11c0,-5 -4,-8 -8,-8l-56 0c-4,0 -8,3 -8,8l0 11 72 0zm-122 58l173 0 0 157c0,4 -4,8 -8,8l-157 0c-4,0 -8,-4 -8,-8l0 -157z"></path></g></svg></span></td>                
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
    },
    data(){
        return{
            pesquisa:'',
            timeout: null
        }
    },
    methods:{
        ordenar(chave){
           return this.$store.getters.listaDeProdutos.sort(sortBy(chave))
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
        delProduto(i){
            this.$store.commit('delProduto', i)
        },
        editProduto(i){
            this.$store.dispatch('alterarProduto', i)
        }
    },
    computed:{
        listaDeProdutos(){  
            return  this.$store.getters.listaDeProdutos
        },
         valorTotalUn() {
            return this.$store.getters.valorTotalUn
        },
    }
}
</script>

<style scop>

</style>