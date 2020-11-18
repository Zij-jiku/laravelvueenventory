<template>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-header bg-img p-5 position-relative">
                    <div class="bg-overlay"></div>
                    <h4 class="text-white text-center mb-0">Reset Password</h4>
                </div>
                <div class="card-body p-4 mt-2">
                    <form action="#" class="p-3">

                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Enter your <b>Email</b> and instructions will be sent to you!
                        </div>
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter Email" required="">
                                <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light">Reset</button> </span>
                            </div>
                        </div>

                    </form>

                    <div class="col-sm-7">
                        <router-link to="/"> Back to Login</router-link>
                    </div>

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

}
</script>

<style>

</style>