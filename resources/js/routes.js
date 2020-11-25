// JWT Authenticate Start
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
// JWT Authenticate End
let home = require('./components/home.vue').default;

// Employee Start
let storeemployee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let editemployee = require('./components/employee/edit.vue').default;

// Supplier Start
let storesupplier = require('./components/supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let editsupplier = require('./components/supplier/edit.vue').default;

// Category Start
let storecategory = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;
let editcategory = require('./components/category/edit.vue').default;

// Product Start
let storeproduct = require('./components/product/create.vue').default;
let product = require('./components/product/index.vue').default;
let editproduct = require('./components/product/edit.vue').default;

// Expense Start
let storeexpense = require('./components/expense/create.vue').default;
let expense = require('./components/expense/index.vue').default;
let editexpense = require('./components/expense/edit.vue').default;

// Salary Start
let salary = require('./components/salary/all_employee.vue').default;
let paysalary = require('./components/salary/create.vue').default;
let allsalary = require('./components/salary/index.vue').default;
let viewsalary = require('./components/salary/view.vue').default;
let editsalary = require('./components/salary/edit.vue').default;


export const routes = [
    // Jwt Auth Start
    { path: '/', component: login , name: '/' },
    { path: '/register', component: register , name: 'register'},
    { path: '/forget', component: forget , name: 'forget'},
    { path: '/logout', component: logout , name: 'logout'},
    // Jwt Auth End
    { path: '/home', component: home , name: 'home'},
    
    // Employee Route
    { path: '/store-employee', component: storeemployee , name: 'store-employee'},
    { path: '/all-employee', component: employee , name: 'employee'},
    { path: '/edit-employee/:id', component: editemployee , name: 'edit-employee'},

    // Supplier Route
    { path: '/store-supplier', component: storesupplier , name: 'store-supplier'},
    { path: '/all-supplier', component: supplier , name: 'supplier'},
    { path: '/edit-supplier/:id', component: editsupplier , name: 'edit-supplier'},

    // Category Route
    { path: '/store-category', component: storecategory , name: 'store-category'},
    { path: '/all-category', component: category , name: 'category'},
    { path: '/edit-category/:id', component: editcategory , name: 'edit-category'},

    // Product Route
    { path: '/store-product', component: storeproduct , name: 'store-product'},
    { path: '/all-product', component: product , name: 'product'},
    { path: '/edit-product/:id', component: editproduct , name: 'edit-product'},

    // Expense Route
    { path: '/store-expense', component: storeexpense , name: 'store-expense'},
    { path: '/all-expense', component: expense , name: 'expense'},
    { path: '/edit-expense/:id', component: editexpense , name: 'edit-expense'},

    // Salary Route
    { path: '/given-salary', component: salary , name: 'given-salary'},
    { path: '/pay-salary/:id', component: paysalary , name: 'pay-salary'},
    { path: '/salary', component: allsalary , name: 'salary'},
    { path: '/view-salary/:id', component: viewsalary , name: 'view-salary'},
    { path: '/edit-salary/:id', component: editsalary , name: 'edit-salary'},


    

  ]