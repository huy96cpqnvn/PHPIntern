<template>
    <div>
        <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>THÊM CÔNG VIỆC</h3>
                </div>
                <div class="panel-body">
                    <form class="m-5" @submit.prevent="addTodo">
                        <div class="form-group">
                            <label for="title">Tên Công Việc</label>
                            <input type="text" v-model="todo.title" class="form-control" id="title" placeholder="Mời nhập công việc" required>
                            <!-- <span>{{ errors.first('title') }}</span> -->
                        </div>
                        <div class="form-group">
                            <label for="description">Ghi chú</label>
                            <input type="text"  class="form-control" v-model="todo.description" id="description" placeholder="Mời nhập ghi chú" required>
                            <!-- <span>{{ errors.first('description') }}</span> -->
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
                            <button type="button" class="btn btn-danger" v-on:click="cancel">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateTodo",
    data() {
        return {
            todoId: null,
            todo: {
                title: null,
                description: null,
                status: 0
            }

        }
    },
    methods: {
        addTodo() {
            console.log('a')
            this.$store.dispatch('addTodo', this.todo).then(res => {
                if (res.status == 200) {
                    swal({
                        title: "Add Todo Successfully",
                        icon: "success"
                    })
                    this.$router.push("/")
                }

            })
        },
        cancel(){
            this.$router.push("/")
        }
    }
}
</script>

<style scoped>

</style>
