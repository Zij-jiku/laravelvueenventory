<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Employee View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Employee All</li>
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
                    <h2 class="card-title text-center">Employee List</h2>
                    <router-link to="/salary" class="btn btn-success">All Salary Month</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Employee Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Employee Name</th>
                                    <th> Joining Date</th>
                                    <th> Salary</th>
                                    <th> Photo</th>
                                    <th> Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(employee,index) in filtersearch" :key="index">
                                    <td> {{ employee.id }} </td>
                                    <td> {{ employee.name }} </td>
                                    <td> {{ employee.joining_date }} </td>
                                    <td> {{ employee.salary }} </td>
                                    <td>
                                        <img :src="employee.photo" alt="" style="width:80px; height:60px;">
                                    </td>
                                    <td>
                                        
                                        <router-link :to="{ name: 'pay-salary',params:{id: employee.id}}" class="btn btn-sm btn-primary">Pay Salary</router-link>

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
            employees: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.employees.filter(employee => {
                return employee.name.match(this.searchTerm)
            });
        }
    },
    methods: {
       allEmployee(){
           axios.get('/api/employee')
           .then(({data}) => (this.employees = data))
           .catch()
       },

    },
    created(){
        this.allEmployee();
    }
}
</script>

<style>

</style>