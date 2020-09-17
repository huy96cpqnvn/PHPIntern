<template>
    <div>
        <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edit Category</h3>
                </div>
                <div class="panel-body">
                    <form class="m-5" @submit.prevent="updateTodo">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" v-model="cate.title" id="title"  required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" v-model="cate.description" id="description"  required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="submit" class="btn btn-danger" @click="cancel">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "EditCategory",
    data(){
    return {
        cateId: null,
        cate: {
            title: null,
            description: null
        }
    }
    },
    mounted() {
    var id = this.$route.params.id
        this.cateId = id
        this.$store.dispatch('editCategory',{id:id}).then(res => {
            this.cate = res.data
        })
    },
    methods: {
        updateTodo() {
            console.log('a')
            this.$store.dispatch('updateCategory', this.cate).then(res => {
                if (res.status == 200 ) {
                    swal({
                        title: "Edit Todo successfully",
                        icon: "success"
                    })
                    this.$router.push("/category");
                }
            })
        },
        cancel() {
            this.$router.push("/category");
        }
    }
}
</script>

<style scoped>

</style>
