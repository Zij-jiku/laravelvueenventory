<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Product View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Product All</li>
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
                    <h2 class="card-title text-center">All Product</h2>
                    <router-link to="/store-product" class="btn btn-success">Add Product</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Product Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Product Name</th>
                                    <th> Category Name</th>
                                    <th> Supplier Name</th>
                                    <th> Product Code </th>
                                    <th> Route </th>
                                    <th> Selling Price </th>
                                    <th> Photo </th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(product,index) in filtersearch" :key="index">
                                    <td> {{ product.id }} </td>
                                    <td> {{ product.product_name }} </td>
                                    <td> {{ product.category_name }} </td>
                                    <td> {{ product.name }} </td>
                                    <td> {{ product.product_code }} </td>
                                    <td> {{ product.root }} </td>
                                    <td> {{ product.selling_price }} </td>
                                    <td>
                                        <img :src="product.photo" alt="" style="width:80px; height:60px;">
                                    </td>
                                    <td>
                                        
                                        <router-link :to="{ name: 'edit-product',params:{id: product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger text-light">Delete</a>
                                       
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

       deleteProduct(id){

           Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/product/'+id)
                    .then(() => {
                        this.products = this.products.filter(product => {
                            return product.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'product'})
                    })
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });

       }

    },
    created(){
        this.allProduct();
    }
}
</script>

<style>

</style>