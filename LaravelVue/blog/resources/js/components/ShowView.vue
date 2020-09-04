<template>
        <div>
            <div class="row m-2">
                <label  class="col-sm-2 col-form-label font-weight-bold pull-right">Phân Loại:</label>
                <div class="col-sm-3">
                    <select class="form-control form-control-sm" @change="getListByStatus" v-model="status" id="status">
                        <option disable value="TẤT CẢ">--TẤT CẢ--</option>
                        <option>ACTIVE</option>
                        <option>DONE</option>
                        <option>DELETED</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <router-link to="/todo/create"><button class="btn-primary btn-sm">Thêm công việc</button></router-link>
                </div>

            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tên công việc</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Chi Tiết</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(todo, index) in todos" v-bind:key="index">
                    <td>
                        {{ todo.title }}
                    </td>
                    <td>{{ todo.description}}</td>
                    <td> {{todo.status}}</td>
                    <td class="text-center">
                        <button class=" btn-danger btn-sm" v-on:click="deleteTodo(todo.id)">Xóa</button>
                        <router-link :to="{name:'edit', params:{id:todo.id}}"><button class="btn-primary btn-sm">Sửa </button></router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<script>

export default {
    name: "ShowView",
    data() {
        return {
            status: "All"
        }
    },
    created() {
        this.getList();
    },
    computed: {
        todos() {
            return this.$store.getters.todos;
        }
    },
    methods: {
        getList() {
            this.$store.dispatch('getTodos')
        },
        getListByStatus() {
            this.$store.dispatch('showTodoByStatus',{
                status: this.status
            }).then(res => {
                this.$store.commit('Get_Todos', res.data.data);
            })
        },
        deleteTodo(id) {
            swal({
                title: 'Are you sure?',
                icon: 'warning',
                buttons: {
                    confirm: true,
                    cancel: true
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.$store.dispatch('deleteTodo', {
                        id: id
                    }).then(res => {
                        if (res.data.code == 200) {
                            this.getList();
                            swal({
                                title: "Delete Todo Successfully",
                                icon: "success"
                            })
                        } else {
                            swal({
                                title: "error",
                                icon: "warning"
                            })
                        }
                    })
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
