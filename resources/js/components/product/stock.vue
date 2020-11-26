<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Stock View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Stock</li>
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
                    <h2 class="card-title text-center">Stock Details</h2>
                    <router-link to="/all-product" class="btn btn-success">All Product</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Product Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Photo </th>
                                    <th> Product Name</th>
                                    <th> Category Name</th>
                                    <th> Product Code </th>
                                    <th> Route </th>
                                    <th> Buying Price </th>
                                    <th> Product Quantity </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(product,index) in filtersearch" :key="index">
                                    <td> {{ product.id }} </td>
                                    <td>
                                        <img :src="product.photo" alt="" style="width:80px; height:60px;">
                                    </td>
                                    <td> {{ product.product_name }} </td>
                                    <td> {{ product.category_name }} </td>
                                    <td> {{ product.product_code }} </td>
                                    <td> {{ product.root }} </td>
                                    <td> {{ product.buying_price }} </td>
                                    <td> {{ product.product_quantity }} </td>

                                    <td v-if="product.product_quantity >= 1 ">
                                        <span class="badge badge-success">Available</span>
                                    </td>
                                    <td v-else>
                                        <span class="badge badge-danger">Stock Out</span>
                                    </td>

                                    <td>   
                                       <router-link :to="{ name: 'edit-stock',params:{id: product.id}}" class="btn btn-sm btn-primary">Stock Edit</router-link>
                                    </td>


                                </tr>

                            </tbody>
                    </table>

                    
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
        return{
            products: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.products.filter(product => {
                return product.product_name.match(this.searchTerm)
                // return employee.phone.match(this.searchTerm)
                // return employee.email.match(this.searchTerm)
            });
        }
    },
    methods: {
       allProduct(){
           axios.get('/api/product')
           .then(({data}) => (this.products = data))
           .catch()
       },

    },
    created(){
        this.allProduct();
    }
}
</script>

<style>

</style>