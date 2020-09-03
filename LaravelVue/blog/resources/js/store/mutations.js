export default {
    Get_Todos(state, payload) {
        state.todos = payload
    },
    Get_Edit(state, payload) {
        state.todoEdit = payload
    }
}
