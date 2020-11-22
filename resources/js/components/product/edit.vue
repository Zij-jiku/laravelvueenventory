<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Employee Edit Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Employee Edit</li>
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
                    <h2 class="card-title text-center">Edit Employee</h2>
                    <router-link to="/all-product" class="btn btn-success">All Employee</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="productUpdate" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" v-model="form.product_name">
                                    <span class="text-danger" v-if="errors.product_name"> {{ errors.product_name[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" placeholder="Product Code" v-model="form.product_code">
                                    <span class="text-danger" v-if="errors.product_code"> {{ errors.product_code[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select v-model="form.category_id" id="" class="form-control">
                                        <option value="" disable>--Select One --</option>
 
                                        <option :value="category.id" v-for="(category,id) in categories" :key="id">
                                            {{ category.category_name }}
                                        </option>
                                        
                                    </select>
                                    <span class="text-danger" v-if="errors.category_id"> {{ errors.category_id[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label>Select Supplier</label>
                                    <select v-model="form.supplier_id" id="" class="form-control">
                                        <option value="">--Select One --</option>
                                         <option :value="supplier.id" v-for="(supplier,id) in suppliers" :key="id">
                                            {{ supplier.name }}
                                        </option>
                                    </select>

                                    <span class="text-danger" v-if="errors.supplier_id"> {{ errors.supplier_id[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>Buying Price</label>
                                    <input type="text" class="form-control" placeholder="Buying Price" v-model="form.buying_price">
                                    <span class="text-danger" v-if="errors.buying_price"> {{ errors.buying_price[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                               <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" placeholder="Selling Price" v-model="form.selling_price">
                                    <span class="text-danger" v-if="errors.selling_price"> {{ errors.selling_price[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>Buying Date</label>
                                    <input type="date" class="form-control" v-model="form.buying_date">
                                    <span class="text-danger" v-if="errors.buying_date"> {{ errors.buying_date[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                               <div class="form-group">
                                    <label>Product Root</label>
                                    <input type="text" class="form-control" placeholder="Product Root" v-model="form.root">
                                    <span class="text-danger" v-if="errors.root"> {{ errors.root[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>Product Quantity</label>
                                    <input type="number" class="form-control" placeholder="Product Quantity" v-model="form.product_quantity">
                                    <span class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                               <div class="form-group">
                                    <label>Alert Quantity</label>
                                    <input type="number" class="form-control" placeholder="Product Root" v-model="form.alert_quantity">
                                    <span class="text-danger" v-if="errors.alert_quantity"> {{ errors.alert_quantity[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>Employee Photo</label>
                                    <input type="file" class="form-control" @change="oneFileSelected">
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
                product_name: '',
                product_code: '',
                root: '',
                buying_price: '',
                selling_price: '',
                buying_date: '',
                product_quantity: '',
                alert_quantity: '',
                photo: '',   
                newphoto: '' 
            },
            errors: {},
            categories: {},
            suppliers: {}
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/product/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))


        // Category Collected
        axios.get('/api/category/')
        .then(({data}) => (this.categories = data))

        // Supplier Collected
         axios.get('/api/supplier/')
        .then(({data}) => (this.suppliers = data))

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

        productUpdate(){
            let id = this.$route.params.id
             axios.patch('/api/product/'+id,this.form)
             .then(() => {
                 this.$router.push({name: 'product'})
                 Notification.update()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
    

}
</script>

<style>

</style>