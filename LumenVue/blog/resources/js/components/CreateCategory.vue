<template>
    <div class="d-flex" id="wrapper">

        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'dashboard'}">Dashboard</router-link>
                </a>
                <a class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'showCate'}">Category</router-link>
                </a>
                <a class="list-group-item list-group-item-action bg-light">
                    <router-link :to="{name: 'showNews'}">News</router-link>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div>
                <div class="col-xl-8 mx-auto m-5 " style="border:2px solid #000000; padding:5px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Add Category</h3>
                        </div>
                        <div class="panel-body">
                            <form class="m-5" @submit.prevent="addCategory">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" v-model="cate.title" class="form-control" id="title"
                                           placeholder="Enter Category" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" v-model="cate.description" class="form-control" id="description"
                                           placeholder="Enter description of Category" required>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="submit" class="btn btn-danger" v-on:click="cancel">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "CreateCategory",
    data() {
        return {
            cateID: null,
            cate: {
                title: null
            }
        }
    },
    computed: {
        ...mapGetters([
            'isLogged'
        ])
    },
    methods: {
        addCategory() {
            this.$store.dispatch('addCategory', this.cate).then(res => {
                if (res.status == 201) {
                    swal({
                        title: "Add Todo Successfully",
                        icon: "success"
                    })
                    this.$router.push("/category")
                }
            })
        },
        cancel() {
            this.$router.push("/category")
        },
        logout() {
            this.$store.dispatch('logout')
        }
    },
}
</script>

<style scoped>

</style>
