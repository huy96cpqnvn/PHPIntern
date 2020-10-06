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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <br/>
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Change Password</h4>
                            </header>
                            <article class="card-body">
                                <form @submit.prevent="changePassword">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input v-model="old_password" type="text" class="form-control"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input v-model="new_password" type="password" class="form-control"
                                               placeholder="">
                                        <small class="form-text text-muted">Password must be at least 6
                                            characters</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input v-model="confirm_password" class="form-control" type="password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-danger" @click="cancel">Cancel</button>
                                    </div>
                                </form>
                            </article> <!-- card-body end .// -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ChangePassword",
    data() {
        return {
                old_password: null,
                new_password: null,
                confirm_password: null
            }
    },
    methods: {
        changePassword() {
            let itemLocalStorage = (localStorage.getItem('user')).replaceAll('"', '');
            let headers = {
                'Authorization': 'Bearer ' + itemLocalStorage
            };
            axios.post('./api/change-password',{
                old_password: this.old_password,
                new_password: this.new_password,
                confirm_password: this.confirm_password
            }, {headers}
            ).then(res => {
                this.data = res.data;
                this.$router.push("/login");
            });
        },
        cancel() {
            this.$router.push("/dashboard");
        }
    }
}
</script>

<style scoped>

</style>
