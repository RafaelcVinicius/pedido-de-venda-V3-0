<template>
    <div class="component"> 
        <div class="consulta-table">
            <fieldset class="cl-2">
                <legend><label for="pesquisa">Pesquisar</label></legend>  
                <input v-model="pesquisa" @keyup="pesquisadados" class="div-absolut" type="text" name="pesquisa" id="pesquisa">
            </fieldset>
        </div>
        <div class="div-tabela">
            <table>
                <thead>
                    <tr class="thead-tr">
                        <th @click="ordenar('campo1')" ><slot name="thead-1"></slot></th>
                        <th @click="ordenar('campo2')" ><slot name="thead-2"></slot></th>
                        <th @click="ordenar('campo3')" ><slot name="thead-3"></slot></th>
                        <th @click="ordenar('campo4')" ><slot name="thead-4"></slot></th>
                        <th @click="ordenar('campo5')" ><slot name="thead-5"></slot></th>
                        <th @click="ordenar('campo6')" ><slot name="thead-6"></slot></th>
                        <th @click="ordenar('campo7')" ><slot name="thead-7"></slot></th>
                        <th>Ação</th>
                    </tr>    
                </thead>
                <tbody>
                    <tr  v-for="(dados, i) in dadosTabelaComput" :key="i">
                        <td>{{ Number(dados.campo1) }}</td>
                        <td>{{ dados.campo2 }}</td>
                        <td>{{ Number(dados.campo3) }}</td>
                        <td>{{ Number(dados.campo4) }}</td>
                        <td>{{ dados.campo5 }}</td>
                        <td>{{ dados.campo6 }}</td>
                        <td class="borda-left"> {{ dados.campo7 }}</td>
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
        }
    },
    computed:{
        dadosTabelaComput(){
            return this.$store.state.dadosTabela
        }
    },
    created(){
        
        this.$http.get('/api/'+this.url).then(res => {this.$store.commit('addRegistroTabela', res.data),console.log(this.$store.state.dadosTabela)})   
    },
}
</script>

<style>

</style>