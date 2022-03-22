<template>
    <div class="component-ter cl">
        <fieldset :class="{fieldsetativo: displaystatus}" class="cl">
            <legend>Status</legend>
            <input readonly="readonly" @click="displaystatus = !displaystatus" type="text" id="situacao" name="situacao" :value="status">
             <i class="i-btn"  :class="{fieldsetativo: displaystatus}" @click.prevent="displaystatus = !displaystatus"><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
        </fieldset>
        <ul class="lista" v-show="displaystatus">
            <li @click="status = 'Aberto'">Aberto</li>
            <li @click="status = 'Cancelado'">Cancelado</li>
            <li @click="status = 'Finalizado'">Finalizado</li>
        </ul>
    </div>
</template>

<script>
export default {
    data(){
        return{
            status:'Aberto',
            displaystatus:false
        }
    }
}
</script>

<style>

</style>