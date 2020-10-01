<template>
    <div class="d-flex" id="wrapper overflow">
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div><h4><router-link id="main-title" :to="{ name: 'dashboard' }">Today News</router-link></h4></div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<!--                                                <li class="nav-item active">-->
<!--                                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--                                                </li>-->
<!--                                                <li class="nav-item">-->
<!--                                                    <a class="nav-link" href="#">Link</a>-->
<!--                                                </li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Account
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!--                                <a class="dropdown-item"><router-link :to="{ name: 'profile' }">Profile</router-link></a>-->
                                <a class="dropdown-item"><router-link :to="{ name: 'login' }">Login</router-link></a>
                                <a class="dropdown-item"><router-link :to="{ name: 'register' }">Register</router-link></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <button class="btn btn-primary" style="margin-left: 25px;" type="button" @click="logout()" v-if="isLogged">
                                    Logout
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div>
            <router-view></router-view>
            </div>
        </div>
    </div>



</template>

<script>
import { mapGetters } from 'vuex'
export default {
    computed: {
        ...mapGetters([
            'isLogged'
        ])
    },
    methods: {
        logout() {
            this.$store.dispatch('logout')
        }
    }
};

</script>
<style>
#overflow {
    overflow-x: unset;
}
#main-title:hover {
    text-decoration: none;
}
</style>
