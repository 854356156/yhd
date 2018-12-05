import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        'user': null
    },
    mutations:{
        changeUser(state,user){
            state.user = user
        }
    }
})