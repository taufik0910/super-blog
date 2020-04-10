import AdminHome from './components/admin/AdminHome.vue'
import categorylist from './components/admin/category/List.vue'
import addCategory from './components/admin/category/New.vue'
import editCategory from './components/admin/category/Edit.vue'

export const routes = [{
        path: '/home',
        component: AdminHome
    },
    {
        path: '/category-list',
        component: categorylist
    },
    {
        path: '/add_category',
        component: addCategory
    },
    {
        path: '/edit_category/:categoryid',
        component: editCategory
    },
]