require('./bootstrap');
window.Vue = require('vue');
// vue router
import VueRouter from 'vue-router' 
Vue.use(VueRouter)

import{routes} from './routes';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

 //V-Form
 import { Form, HasError, AlertError } from 'vform'
 Vue.component(HasError.name, HasError)
 Vue.component(AlertError.name, AlertError)
 window.Form = Form;



const router = new VueRouter({
    routes, // short for `routes: routes`
    
  })


const app = new Vue({
    el: '#app',
    router
}).$mount;
