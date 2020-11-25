<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Expense View Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Expense All</li>
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
                    <h2 class="card-title text-center">All Expense</h2>
                    <router-link to="/store-expense" class="btn btn-success">Add Expense</router-link>

                </div>
                
                <div class="card-body">
                    <span class="text-danger"><strong>Employee Search</strong></span>:
                    <input type="text" v-model="searchTerm" class="form-controller mb-2" placeholder="Search here..." style="width:250px; border:2px solid #222; border-radius: 2px;">

                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th> ID No.</th>
                                    <th> Expense Details</th>
                                    <th> Expense Date </th>
                                    <th> Expense Amount </th>
                                    <th> Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="(expense,index) in filtersearch" :key="index">
                                    <td> {{ expense.expense_details }} </td>
                                    <td> {{ expense.expense_date }} </td>
                                    <td> {{ expense.amount }} </td>
                                    
                                    <td>
                                        
                                        <router-link :to="{ name: 'edit-expense',params:{id: expense.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteExpense(expense.id)" class="btn btn-sm btn-danger text-light">Delete</a>
                                       
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
            expenses: [],
            searchTerm: ''
        }
    },
    computed: {
        filtersearch(){
            return this.expenses.filter(expense => {
                return expense.expense_date.match(this.searchTerm)
                // return employee.phone.match(this.searchTerm)
                // return employee.email.match(this.searchTerm)
            });
        }
    },
    methods: {
       allExpense(){
           axios.get('/api/expense')
           .then(({data}) => (this.expenses = data))
           .catch()
       },

       deleteExpense(id){

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
                    axios.delete('/api/expense/'+id)
                    .then(() => {
                        this.expenses = this.expenses.filter(expense => {
                            return expense.id != id
                        })
                    })
                    .catch(() => {
                        this.$router.push({name: 'expense'})
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
        this.allExpense();
    }
}
</script>

<style>

</style>