export default {
    News_Add(state, payload) {
        state.newsAdd = payload
    },
    News_Edit(state, payload) {
        state.newsEdit = payload
    },

    Cate_Add(state, payload) {
        state.cateAdd = payload
    },
    Cate_Edit(state, payload) {
        state.cateEdit = payload
    },

    setUserData(state, userData) {
        state.user = userData
        localStorage.setItem('user', JSON.stringify(userData))

    },
    clearUserData() {
        localStorage.removeItem('user')
        location.reload()
    },
}
