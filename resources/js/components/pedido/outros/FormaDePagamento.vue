<template>
   <div class="component-sec">
        <div class="div-grup">
          <h5 class="titulo-grupo">Forma de pagamento</h5>
            <div class="div-tabela">  
                <table>
                    <thead>
                        <tr>
                            <th>Espécie</th>
                            <th>Valor pago(R$)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr-table" v-for="(especie, i) in especies" :key="i">
                            <td class="td-left"> {{especie.nome}}</td>
                            <td >
                                <fieldset class="cl">
                                    <input type="text" v-model="especie.valor"  @blur="setFormaDePagamento()" v-money="money">
                                </fieldset>
                            </td>
                        </tr>
                    </tbody>                
                </table>
            </div>    
        </div>
  </div>      
</template>

<script>
export default {
    data(){
        return{
             money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
            }    
        }
    },

    // props: ['especiesdefault'],

    methods:{
        setFormaDePagamento(){
            this.$store.dispatch('setformasDePagamento', this.especies)
        }
    },
    created(){
            
    },
    computed:{
        especies(){
            return this.$store.getters.valorEspecies
        }
    }
}
</script>

<style scoped>
    fieldset{
        position: relative;
       margin: 0 1rem;
        height: 35px;
        left: 0px;
        top:0px;
    }
    fieldset input{
        position: absolute;
        top: 4.5px;
        height: 25px;
        text-align: end;
    }
    .td-left{
        display: flex;
        margin: 1rem;
    }
</style>