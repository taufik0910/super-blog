export default {
    state: {
        category: [],
        post: [],
    },
    getters: {
        getCategory(state) {
            return state.category

        },
        getPost(state) {
            return state.post

        },

    },
    actions: {
        allCategory(context) {
            axios.get('/category')
                .then((response) => {
                    context.commit('categories', response.data.categories)
                })
        },

        getallpost(context) {
            axios.get('/posted')
                .then((response) => {
                    //console.log(response.data)
                    context.commit('post', response.data.posts)

                })
        },

    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },

        post(state, payload) {
            return state.post = payload
        }


    }
}