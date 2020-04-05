import AdminHome from './components/admin/AdminHome.vue'
import testing from './components/admin/category/List.vue'

export const routes = [
  {
    path:'/home', 
    component: AdminHome
  },

  {
    path:'/test', 
    component: testing
  },
  ]