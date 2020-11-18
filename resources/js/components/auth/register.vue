<template>
    <div class="row justify-content-center">
     <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-header bg-img p-5 position-relative">
                <div class="bg-overlay"></div>
                <h4 class="text-white text-center mb-0">Create a new Account</h4>
            </div>
            <div class="card-body p-4 mt-2">

                <form  class="p-3" @submit.prevent="register">

                    <div class="form-group mb-3">
                        <input class="form-control" type="text" placeholder="Full Name" v-model="form.name">
                        <span class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </span>
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" type="email" placeholder="Email" v-model="form.email">
                        <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" type="password" placeholder="Password" v-model="form.password">
                        <span class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </span>
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" type="password" placeholder="Confirm Password" v-model="form.password_confirmation">
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox checkbox-primary">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-4">
                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Register </button>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-center">
                            <router-link to="/">Already have account?</router-link>
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->

     </div>
     <!-- end col -->
    </div>
    <!-- end row -->
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
                name: null,
                email: null,
                password: null,
                confirm_password: null,
            },
            errors: {}
        }
    },
    methods: {
        register(){
            axios.post('/api/auth/register',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                Toast.fire({
                    icon: 'success',
                    title: 'Account created successfully'
                })                
                this.$router.push({name: 'home'})
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    }

}
</script>

<style>

</style>