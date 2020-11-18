<template>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-header bg-img p-5 position-relative">
                    <div class="bg-overlay"></div>
                    <h4 class="text-white text-center mb-0">Sign In to Enventory</h4>
                </div>
                <div class="card-body p-4 mt-2">

                    <form class="p-3" @submit.prevent="login">

                        <div class="form-group mb-3">
                            <input class="form-control" type="email" placeholder="Email" v-model="form.email">
                            <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>
                        </div>

                        <div class="form-group mb-3">
                            <input class="form-control" type="password" placeholder="Password" v-model="form.password">
                            <span class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </span>
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group text-center mt-5 mb-4">
                            <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In </button>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-7">
                                <router-link to="forget"><i class="fa fa-lock mr-1"></i> Forgot your password?</router-link>
                            </div>
                            <div class="col-sm-5 text-right">
                                <router-link to="register">Create an account</router-link>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
</template>

<script>
export default {
    created() {
        if(User.loggedIn()){
            this.$router.push({name: 'home'})
        }
    },
    data(){
        return {
            form: {
                email: null,
                password: null,
            },
            errors: {}
        }
    },
    methods: {
        login(){
            axios.post('/api/auth/login',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                })                
                this.$router.push({name: 'home'})
            })
            .catch(error => this.errors = error.response.data.errors)
            .catch(
                 Toast.fire({
                    icon: 'warning',
                    title: 'Email or Password invalid'
                })           
            )
        }
    }
}
</script>

<style>

</style>