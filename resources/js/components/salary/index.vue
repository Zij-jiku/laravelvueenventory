<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Salary View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Salary Month All</li>
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
                    <h2 class="card-title text-center">Employee Salary Details</h2>
                    <router-link to="/given-salary" class="btn btn-success">Pay Salary</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Month Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> SL No.</th>
                                    <th> Month Name</th>
                                    <th> Detials</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(salary,index) in filtersearch" :key="index">
                                    <td> {{ index + 1 }} </td>
                                    <td> {{ salary.salary_month }} </td>
                                    <td>
                                        
                                        <router-link :to="{ name: 'view-salary',params:{id: salary.salary_month}}" class="btn btn-sm btn-primary">View Salary</router-link>

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
            salaries: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.salaries.filter(salary => {
                return salary.salary_month.match(this.searchTerm)
            });
        }
    },
    methods: {
       allSalary(){
           axios.get('/api/salary')
           .then(({data}) => (this.salaries = data))
           .catch()
       },

    },
    created(){
        this.allSalary();
    }
}
</script>

<style>

</style>