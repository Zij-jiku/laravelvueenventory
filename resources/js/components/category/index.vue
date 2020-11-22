<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Category View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Category All</li>
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
                    <h2 class="card-title text-center">All Category</h2>
                    <router-link to="/store-category" class="btn btn-success">Add Category</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Category Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Category Name</th>
                                    <th> Photo</th>
                                    <th> Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(category,index) in filtersearch" :key="index">
                                    <td> {{ category.id }} </td>
                                    <td> {{ category.category_name }} </td>
                                   
                                    <td>
                                        <img :src="category.photo" alt="" style="width:80px; height:60px;">
                                    </td>
                                    <td>
                                        
                                        <router-link :to="{ name: 'edit-category',params:{id: category.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger text-light">Delete</a>
                                       
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
            categories: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.categories.filter(category => {
                return category.category_name.match(this.searchTerm)
            });
        }
    },
    methods: {
       allCategory(){
           axios.get('/api/category')
           .then(({data}) => (this.categories = data))
           .catch()
       },

       deleteCategory(id){

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
                    axios.delete('/api/category/'+id)
                    .then(() => {
                        this.categories = this.categories.filter(category => {
                            return category.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'category'})
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
        this.allCategory();
    }
}
</script>

<style>

</style>