<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Customer View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Customer All</li>
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
                    <h2 class="card-title text-center">All Customer</h2>
                    <router-link to="/store-customer" class="btn btn-success">Add Customer</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Customer Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Customer Name</th>
                                    <th> Email</th>
                                    <th> Address </th>
                                    <th> Phone </th>
                                    <th> Photo</th>
                                    <th> Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(customer,index) in filtersearch" :key="index">
                                    <td> {{ customer.id }} </td>
                                    <td> {{ customer.name }} </td>
                                    <td> {{ customer.email }} </td>
                                    <td> {{ customer.address}} </td>
                                    <td> {{ customer.phone}} </td>
                                    <td>
                                        <img :src="customer.photo" alt="" style="width:80px; height:60px;">
                                    </td>
                                    <td>
                                        
                                        <router-link :to="{ name: 'edit-customer',params:{id: customer.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteCustomer(customer.id)" class="btn btn-sm btn-danger text-light">Delete</a>
                                       
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
            customers: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.customers.filter(customer => {
                return customer.name.match(this.searchTerm)
                // return employee.phone.match(this.searchTerm)
                // return employee.email.match(this.searchTerm)
            });
        }
    },
    methods: {
       allCustomer(){
           axios.get('/api/customer')
           .then(({data}) => (this.customers = data))
           .catch()
       },

       deleteCustomer(id){
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
                    axios.delete('/api/customer/'+id)
                    .then(() => {
                        this.customers = this.customers.filter(customer => {
                            return customer.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'customer'})
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
        this.allCustomer();
    }
}
</script>

<style>

</style>