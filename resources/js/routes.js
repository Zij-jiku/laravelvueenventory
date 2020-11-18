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

export const routes = [
    // Jwt Auth Start
    { path: '/', component: login , name: '/' },
    { path: '/register', component: register , name: 'register'},
    { path: '/forget', component: forget , name: 'forget'},
    { path: '/logout', component: logout , name: 'logout'},
    // Jwt Auth End
    { path: '/home', component: home , name: 'home'},
    
    // Employee
    { path: '/store-employee', component: storeemployee , name: 'store-employee'},
    { path: '/all-employee', component: employee , name: 'employee'},
    { path: '/edit-employee', component: editemployee , name: 'edit-employee'},

    


  ]