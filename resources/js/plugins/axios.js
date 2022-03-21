import Vue from 'vue'
import axios from 'axios'

// axios.defaults.baseURL = 'http://localhost:8000/'

Vue.use({
    install(Vue){
        Vue.prototype.$http = axios.create({
            baseURL: 'http://localhost:8000/'
        }),
        Vue.prototype.$api = axios.create({
            baseURL: 'https://viacep.com.br/'
        })
    }
})