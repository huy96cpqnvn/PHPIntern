import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

axios.defaults.baseURL = "http://localhost:8000"

import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export default new Vuex.Store({
    state: {
        newsAdd: null,
        newsEdit: null,
        cateAdd: null,
        cateEdit: null,
        user: null
    },
    getters,
    mutations,
    actions
})
