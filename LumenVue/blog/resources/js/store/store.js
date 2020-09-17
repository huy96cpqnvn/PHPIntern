import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export default new Vuex.Store({
    state: {
        newsAdd: null,
        newsEdit: null,
        cateAdd: null,
        cateEdit: null
    },
    getters,
    mutations,
    actions
})
