<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <br/>
                <div class="card">
                    <header class="card-header">
                        <a class="float-right btn btn-outline-primary mt-1">
                            <router-link :to="{ name: 'login' }">Sign in</router-link>
                        </a>
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form @submit.prevent="register">
                            <div class="form-group">
                                <label>Name</label>
                                <input v-model="user.name" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input v-model="user.email" type="email" class="form-control" placeholder="">
                                <small class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label>Create password</label>
                                <input v-model="user.password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Register</button>
                            </div>
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center">Have an account? <a>
                        <router-link :to="{ name: 'login' }">Login</router-link>
                    </a></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->
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
                if (res.status == 201) {
                    swal({
                        title: "Account Completed!",
                        icon: "success"
                    })
                    this.$router.push("/login")
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
