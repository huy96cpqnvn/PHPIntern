<template>
    <div class="container">
        <form @submit.prevent="register">
            <h1>Register</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="user.name" required>

            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="user.email"
                       required>

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="user.password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null
            }


        }
    },
    methods: {
        register() {
        this.$store.dispatch('register', this.user).then(res => {
            if(res.status == 201) {
                swal({
                    title: "Account Completed!",
                    icon: "success"
                })
                this.$router.push("/dashboard")
            }
        })
        }
    }
}
</script>

<style scoped>

</style>
