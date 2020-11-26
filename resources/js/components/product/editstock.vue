<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Stock Update Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Stock Edit</li>
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
                     <router-link to="/all-product" class="btn btn-success">All Product</router-link>
                    <router-link to="/stock" class="btn btn-primary">Stock</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="stockUpdate">

                        <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                    <label>Product Quantity</label>
                                    <input type="number" class="form-control" placeholder="Product Quantity" v-model="form.product_quantity">
                                    <span class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Stock Update</button>
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
                product_quantity: '',
            },
            errors: {},
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/stock/view/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))

    },
    methods: {
        stockUpdate(){
            let id = this.$route.params.id
             axios.post('/api/stock/update/'+id,this.form)
             .then(() => {
                 this.$router.push({name: 'stock'})
                 Notification.update()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
    

}
</script>

<style>

</style>