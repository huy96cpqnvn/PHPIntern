<template>
    <div class="container">
        <div class="row justify-content-center">
            <aside class="col-sm-4"><br/>
                <div class="card">
                    <article class="card-body">
                        <a class="float-right btn btn-outline-primary">
                            <router-link :to="{ name: 'register' }">Sign up</router-link>
                        </a>
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>
                        <form class="login" @submit.prevent="login">
                            <div class="form-group">
                                <label>Your email</label>
                                <input v-model="email" class="form-control" placeholder="Email" type="email" required>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <a class="float-right" href="#">Forgot?</a>
                                <label>Your password</label>
                                <input v-model="password" class="form-control" placeholder="******" type="password"
                                       required>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <div class="checkbox">
                                    <label> <input type="checkbox"> Save password </label>
                                </div> <!-- checkbox .// -->
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login</button>
                            </div>
                        </form>
                    </article>
                </div>
            </aside>
        </div>
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



