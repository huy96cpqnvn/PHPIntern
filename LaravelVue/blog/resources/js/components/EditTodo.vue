<template>
    <div>
        <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>SỬA CÔNG VIỆC</h3>
                </div>
                <div class="panel-body">
                    <form class="m-5" @submit.prevent="updateTodo">
                        <div class="form-group">
                            <label for="title">Tên Công Việc</label>
                            <input type="text" class="form-control" v-model="todo.title" id="title" placeholder="Mời nhập công việc" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Ghi chú</label>
                            <input type="text" class="form-control" v-model="todo.description" id="description" placeholder="Mời nhập ghi chú" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng Thái</label>
                            <select class="form-control" v-model="todo.status" id="status">
                                <option disable value="0">Please, Choose an option</option>
                                <option>ACTIVE</option>
                                <option>DONE</option>
                                <option>DELETED</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <button type="submit" class="btn btn-danger" @click="cancel">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditTodo",
    data() {
        return {
            todoId: null,
            todo: {
                title: null,
                description:null,
                status: null,
            }
        }
    },
    mounted() {
        var id = this.$route.params.id; //// Cách lấy tham số trong đường dẫn
        this.todoId = id
        this.$store.dispatch('editTodo', {id:id}).then(res => {
            this.todo = res.data.data
        })

    },
    methods: {
        updateTodo() {
            console.log('a')
            this.$store.dispatch('updateTodo', this.todo).then(res => {
                if (res.status == 200 ) {
                    swal({
                        title: "Edit Todo successfully",
                        icon: "success"
                    })
                    this.$router.push("/");
                }
            })
        },
        cancel() {
            this.$router.push("/");
        }
    }
}
</script>

<style scoped>

</style>
