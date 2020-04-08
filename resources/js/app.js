require('./bootstrap');
window.Vue = require('vue');

// support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
    // vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import { routes } from './routes';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

//V-Form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
//  sweet alert 
import Swal from 'sweetalert2'
window.Swal = Swal
    //  var
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
})

window.Toast = Toast




const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash',

})


const app = new Vue({
    el: '#app',
    router
})