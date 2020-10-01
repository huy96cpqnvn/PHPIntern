<template>
    <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light"><router-link :to="{name: 'dashboard'}">Dashboard</router-link></a>
            <a class="list-group-item list-group-item-action bg-light"><router-link :to="{name: 'showCate'}">Category</router-link></a>
            <a class="list-group-item list-group-item-action bg-light"><router-link :to="{name: 'showNews'}">News</router-link></a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div style="text-align: center;"><h1>This is Dashboard</h1></div>
<!--        <div class="row">-->

<!--            <div class="col-md-6 col-lg-6 col-xl-3">-->
<!--                <div class="media widget-media p-4 bg-white border">-->
<!--                    <div class="icon rounded-circle mr-4 bg-primary">-->
<!--                        <i class="mdi mdi-account-outline text-white "></i>-->
<!--                    </div>-->
<!--                    <div class="media-body align-self-center">-->
<!--                        <h4 class="text-primary mb-2" v-for="(cate, index) in categories">{{ index + 1 }}</h4>-->
<!--                        <p>Total Users</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--        <div>Total Length: {{categories.length}}</div>-->
    </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
name: "Dashboard",
    computed: {
        ...mapGetters([
            'isLogged'
        ]),
            categories() {
                return this.$store.getters.cateAdd;
            }
    },
    methods: {
        logout() {
            this.$store.dispatch('logout')
        }
    }
}
</script>

<style>

</style>
