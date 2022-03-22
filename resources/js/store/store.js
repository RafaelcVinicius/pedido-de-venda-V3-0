import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({

    state: {
        dadosTabela:{
            campo1:Number,
            campo2:String,
            campo3:Number,
            },

    },
    getters: {
      
    },
    mutations: {
        addRegistroTabela(state, payload){
            state.dadosTabela = payload
        },
          
    }
})
