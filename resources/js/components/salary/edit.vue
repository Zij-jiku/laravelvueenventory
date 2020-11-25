<template>
   <div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title">Salary Edit Page</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><router-link to="/home">Dashboard</router-link></li>
                        <li class="breadcrumb-item active">Salary Edit</li>
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
                    <h2 class="card-title text-center">Salary Edit</h2>
                    <router-link to="/salary" class="btn btn-success">Salary</router-link>
                </div>
                <div class="card-body">
                    <form class="user" @submit.prevent="saralyUpdate">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.name">
                                    <span class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Employee Email</label>

                                    <input type="hidden" v-model="form.employee_id">

                                    <input type="email" class="form-control" id="exampleInputPassword2" v-model="form.email">
                                    <span class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">    
                               <div class="form-group">
                                    <label for="exampleInputPassword6">Salary Month</label>
                                    <select v-model="form.salary_month" id="" class="form-control">
                                            <option value="" disable>--Select One --</option>
    
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                            
                                        </select>
                                    <span class="text-danger" v-if="errors.salary_month"> {{ errors.salary_month[0] }} </span>
                                </div>
                            </div>

                            <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Employee Salary</label>
                                    <input type="number" class="form-control" id="exampleInputPassword4" v-model="form.amount">
                                    <span class="text-danger" v-if="errors.amount"> {{ errors.amount[0] }} </span>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Salary Update</button>
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
                name: '',
                email: '',
                salary_month: '',
                salary: '',
                employee_id: ''
            },
            errors: {}
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/salary/edit/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },
    methods: {
        saralyUpdate(){
            let id = this.$route.params.id
             axios.post('/api/salary/update/'+id,this.form)
             .then(() => {
                 this.$router.push({name: 'salary'})
                 Notification.update()
             })
             .catch(error => this.errors = error.response.data.errors)
        }
    }
    

}
</script>

<style>

</style>