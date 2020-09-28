<template>
    <div class="container">
        <form class="login" @submit.prevent="login">
            <h1>Sign in</h1>
            <label>User name</label>
            <input class="form-control" required v-model="email" type="text" placeholder="Email"/>
            <label>Password</label>
            <input class="form-control" required v-model="password" type="password" placeholder="Password"/>
            <hr/>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
</template>

<script>
export default {
name: "Login",
    data() {
    return {
        email: '',
        password: ''
    }
    },
    methods: {
    login() {
        this.$store.dispatch('login', {
            email: this.email,
            password: this.password
        }).then(() => {
            this.$router.push("/dashboard")
        })
        .catch(err => {
            console.log(err)
        })
    }
    }
}
</script>

<style scoped>

</style>



