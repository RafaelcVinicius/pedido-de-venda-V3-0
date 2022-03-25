<template>
    <div class="btn-padrao">
        <button @click="gravarPedido" class="btn-ancora">Gravar</button>
    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    methods:{
        gravarPedido(){
            this.$store.commit('gravarPedido', true)
        }
    }    
}
</script>

<style>

</style>