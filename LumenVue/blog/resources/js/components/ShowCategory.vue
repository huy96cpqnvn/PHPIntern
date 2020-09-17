<template>
    <div>
        <div class="container">
            <div class="row m-2">
                <div class="col-sm-4">
                    <router-link to="/category/create">
                        <button class="btn-primary btn-sm">Add Category</button>
                    </router-link>
                </div>
                <div class="col-sm-4"></div>

                <div class="col-sm-4">

                    <input type="search" class="form-control form-control-sm ml-3 w-75" v-model="search" @change="searchCategory"  placeholder="Search by title">
                </div>


            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(cate, index) in categories" v-bind:key="index">
                    <td>
                        {{ cate.title }}
                    </td>
                    <td>{{ cate.description}}</td>
                    <td class="text-center">
                        <button class=" btn-danger btn-sm" v-on:click="deleteCategory(cate.id)" >Delete</button>
                        <router-link :to="{name:'editCate', params:{id:cate.id}}">
                            <button class="btn-primary btn-sm">Edit</button>
                        </router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

export default {
    name: "ShowCategory",
    data() {
        return {
            search: null
        }
    },
    created() {
        this.getList();
    },
    computed: {
        categories() {
            return this.$store.getters.cateAdd;
        }
    },
    methods: {
        getList(){
            this.$store.dispatch('getCategory')
        },
        searchCategory(){

                return this.$store.dispatch('searchCategory', {search: this.search}).then(res => {
                    this.$store.commit('Cate_Add', res.data)
                })

        },
        deleteCategory(id) {
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
                    this.$store.dispatch('deleteCategory', {
                        id: id

                    }).then(res => {
                        if (res.status == 200) {
                            this.getList();
                            swal({
                                title: "Delete Category Successfully",
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
