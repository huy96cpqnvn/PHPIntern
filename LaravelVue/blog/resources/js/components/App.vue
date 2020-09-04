<template>
    <div class="container">
        <h3 style="text-align: center; color: white" class="bg-primary p-3 ">Laravel + VueJS + Vuex + VueRouter</h3>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
