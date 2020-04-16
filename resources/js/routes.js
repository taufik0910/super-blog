import AdminHome from './components/admin/AdminHome.vue'
import categorylist from './components/admin/category/List.vue'
import addCategory from './components/admin/category/New.vue'
import editCategory from './components/admin/category/Edit.vue'

//post import component
import postList from './components/admin/post/List.vue'
import addPost from './components/admin/post/New.vue'
import editPost from './components/admin/post/Edit.vue'


export const routes = [{
        path: '/',
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

    //post vue route

    {
        path: '/post-list',
        component: postList
    },
    {
        path: '/add_post',
        component: addPost
    },
    {
        path: '/edit-post/:postid',
        component: editPost
    },

]