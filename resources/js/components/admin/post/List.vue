<template>
    <section class="content">
    <div class="row justify-content-around">
      
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>

                <div class="card-tools">
                  <button class="btn btn-primary"> 
                  <router-link to="/add_post" style="color:#fff">Add New Post</router-link>
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
           <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SI</th>
                      <th>user name </th>
                      <th>Category name </th>
                      <th>Title </th>
                      <th>Description </th>
                      <th>Photo </th>
                      
                      <th>Actions</th> 
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(posts,index) in ssgetallpost" :key="posts.id" >
                    <td>{{index+1}}</td>
                    <td v-if="posts.user">{{ posts.user.name }}</td>
                    <td v-if="posts.category">{{ posts.category.cat_name }}</td>
                    <td>{{posts.title |sortlength(20," ...")}}</td>
                    <td>{{posts.description |sortlength(20," ...")}}</td>
                    <td><img :src="ourImage(posts.photo)" alt="" width="50" height="50"></td>
                     
                      <td>
                      <router-link class="badge bg-success" :to=" `/edit_post/ ${posts.id}`">EDIT</router-link>
                        <a href="" @click.prevent="deletePost(posts.id)" class="badge bg-danger">DELETE</a>
                      </td>
                      
                    </tr>
 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

</section>
</template>

<script>
export default {
    name:"List",
    mounted() {
         this.$store.dispatch("getallpost")
        
    },
    computed: {
        ssgetallpost(){
        return this.$store.getters.getPost
        
      }
        
    },
    methods: {
      ourImage(img){
        return "uploadimage/"+img;
      },

      deletePost(id){
      axios.get('/post-del/'+id) 
      .then(()=>{
         this.$store.dispatch("getallpost")
        Toast.fire({
    icon: 'success',
    title: 'Deleted in successfully'
})
      }).catch(()=>{

      })    
      }
        
    },
}
</script>
<style  scoped>

</style>