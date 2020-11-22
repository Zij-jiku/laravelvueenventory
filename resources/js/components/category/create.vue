<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Category Add Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Category Add</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
    <!-- Basic example -->
    <div class="col-xl-12">
        <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Add Category</h2>
                    <router-link to="/all-category" class="btn btn-success">All Category</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="categoryInsert" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleInputPassword3">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Category Name" v-model="form.category_name">
                            <span class="text-danger" v-if="errors.category_name"> {{ errors.category_name[0] }} </span>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="exampleInputPassword8">Category Photo</label>
                                    <input type="file" class="form-control" id="exampleInputPassword8" @change="oneFileSelected">
                                    <!-- <span class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </span> -->
                                </div>
                            </div>

                            <div class="col-md-6">    
                               <div class="form-group">
                                    <img :src="form.photo" style="width:100px; height: 80px;">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- card-body -->
            </div>
            <!-- card -->
        </div>
        <!-- col-->
     <!-- end col -->
    </div>
    <!-- end row -->
   </div>
</template>

<script>
export default {
    created() {
        if(!User.loggedIn()){
            this.$router.push({name: '/'})
        }
    },
    data(){
        return {
            form: {
                category_name: null,
                photo: null
            },
            errors: {}
        }
    },

    methods: {
        oneFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                Notification.img_val()
            }else{
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result
                };
                reader.readAsDataURL(file);
            }
        },

        categoryInsert(){
             axios.post('/api/category',this.form)
             .then(() => {
                 this.$router.push({name: 'category'})
                 Notification.success()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>

</style>