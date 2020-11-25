<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Expense Edit Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Expense Edit</li>
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
                    <h2 class="card-title text-center">Edit Expense</h2>
                    <router-link to="/all-expense" class="btn btn-success">All Expense</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="expenseUpdate" enctype="multipart/form-data">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword7">Expense Amount</label>
                                    <input type="number" class="form-control" id="exampleInputPassword7" placeholder="Expense Amount" v-model="form.amount">
                                    <span class="text-danger" v-if="errors.amount"> {{ errors.amount[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Expense Date</label>
                                    <input type="date" class="form-control" id="exampleInputPassword4" v-model="form.expense_date">
                                    <span class="text-danger" v-if="errors.expense_date"> {{ errors.expense_date[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword3">Expense Detials</label>
                            <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Expense Detials" v-model="form.expense_details">
                            <span class="text-danger" v-if="errors.expense_details"> {{ errors.expense_details[0] }} </span>
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
                expense_details: '',
                expense_date: '',
                amount: '',
            },
            errors: {}
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/expense/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },
    methods: {
        expenseUpdate(){
            let id = this.$route.params.id
             axios.patch('/api/expense/'+id,this.form)
             .then(() => {
                 this.$router.push({name: 'expense'})
                 Notification.update()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
    

}
</script>

<style>

</style>