import axios from 'axios'


export default {
    getNews({commit}) {
        var url = "api/news"
        axios.get(url).then(res => {
            if (res.status == 200) {
                commit('News_Add', res.data);
                // res.data.data: mỗi .data là một lớp dữ liệu trong file json trả về từ res
            } else {
                console.log('Error')
            }
        }).catch(err => {
            console.log(err)
        })
    },
    addNews({commit, dispatch}, payload) {
        let result = axios.post('api/news', payload).then(res => {
            return res;
        })
        return result;
    },
    editNews({commit}, payload) {
        let result = axios.get('api/news/' + payload.id).then(res => {
            commit('News_Edit', res.data);
            return res;
        })
        return result;
    },
    updateNews({commit, dispatch}, payload) {
        let result = axios.put('api/news/' + payload.id, payload).then(res => {
            console.log(res);
            return res
        })
        return result
    },
    deleteNews({commit, dispatch}, payload) {
        let result = axios.delete('api/news/' + payload.id).then(res => {
            return res
        })
        return result
    },
    showNewsByStatus({commit}, payload) {
        let result = axios.get('api/list-by-status/' + payload.status).then(res => {
            console.log(res);
            return res
        })
        return result;
    },

    getCategory({commit}) {
        var url = "./api/category"
        axios.get(url).then(res => {
            if (res.status == 200) {
                commit('Cate_Add', res.data);
            } else {
                console.log('Error')
            }
        }).catch(err => {
            console.log(err)
        })
    },
    addCategory({commit, dispatch}, payload) {
        let result = axios.post('api/category', payload).then(res => {
            return res;
        })
        return result;
    },
    editCategory({commit}, payload) {
        let result = axios.get('api/category/' + payload.id).then(res => {
            commit('Cate_Edit', res.data);
            return res;
        })
        return result;
    },
    updateCategory({commit, dispatch}, payload) {
        let result = axios.put('api/category/' + payload.id, payload).then(res => {
            console.log(res);
            return res
        })
        return result
    },
    deleteCategory({commit, dispatch}, payload) {
        let result = axios.delete('api/category/' + payload.id).then(res => {
            return res
        })
        return result
    }

}
