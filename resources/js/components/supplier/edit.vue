<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Supplier Edit Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Supplier Edit</li>
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
                    <h2 class="card-title text-center">Edit Supplier</h2>
                    <router-link to="/all-supplier" class="btn btn-success">All Supplier</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="supplierUpdate" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.name">
                                    <span class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Supplier Email</label>
                                    <input type="email" class="form-control" id="exampleInputPassword2" v-model="form.email">
                                    <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword7">Supplier Phone</label>
                                    <input type="number" class="form-control" id="exampleInputPassword7" v-model="form.phone">
                                    <span class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Shop Name</label>
                                    <input type="number" class="form-control" id="exampleInputPassword4" v-model="form.shopname">
                                    <span class="text-danger" v-if="errors.shopname"> {{ errors.shopname[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword3">Supplier Address</label>
                            <input type="text" class="form-control" id="exampleInputPassword3" v-model="form.address">
                            <span class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </span>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="exampleInputPassword8">Supplier Photo</label>
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

                        <button type="submit" class="btn btn-primary">Update</button>
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
                name: '',
                email: '',
                phone: '',
                shopname: '',
                address: '',
                photo: '',
                newphoto: ''
            },
            errors: {}
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/supplier/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },
    methods: {
        oneFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
                Notification.img_val()
            }else{
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.newphoto = event.target.result
                };
                reader.readAsDataURL(file);
            }
        },

        supplierUpdate(){
            let id = this.$route.params.id
             axios.patch('/api/supplier/'+id,this.form)
             .then(() => {
                 this.$router.push({name: 'supplier'})
                 Notification.update()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
    

}
</script>

<style>

</style>