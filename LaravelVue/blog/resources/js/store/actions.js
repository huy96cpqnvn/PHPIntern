export default {
    getTodos({ commit }) {
        var url = "api/todo"
        axios.get(url).then(res => {
            if (res.status == 200) {
                commit('Get_Todos', res.data.data);
            } else {
                console.log('Error')
            }
        }).catch(err => {
            console.log(err)
        })
    },
    addTodo({ commit, dispatch }, payload) {
        let result = axios.post('api/todo', payload).then(res => {
            return res;
        })
        return result;
    },
    editTodo({ commit }, payload) {
        let result = axios.get('api/todo/' + payload.id + "/edit").then(res => {
            commit('Get_Edit', res.data);
            return res;
        })
        return result;
    },
    updateTodo({ commit, dispatch }, payload) {
        let result = axios.put('api/todo/' + payload.id, payload).then(res => {
            console.log(res);
            return res
        })
        return result
    },
    deleteTodo({ commit, dispatch }, payload) {
        let result = axios.delete('api/todo/' + payload.id).then(res => {
            return res
        })
        return result
    },
    showTodoByStatus({ commit }, payload) {
        let result = axios.get('api/list-by-status/' + payload.status).then(res => {
            console.log(res);
            return res
        })
        return result;
    }
}
