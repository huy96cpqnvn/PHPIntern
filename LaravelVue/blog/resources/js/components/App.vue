<template>
    <div class="container">
        <h3 class="bg-primary p-3">Welcome to my blog</h3>
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
