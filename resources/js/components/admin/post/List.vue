<template>
    <section class="content">
    <div class="row justify-content-around">
      
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>

                <div class="card-tools">
                  <button class="btn btn-primary"> 
                  <router-link to="/add_category" style="color:#fff">Add Category</router-link>
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
                    <td><img :src="posts.photo" alt="" width="40" height="50"></td>
                     
                      <td>
                      <router-link class="badge bg-success" :to=" `/edit_category/ ${posts.id}`">EDIT</router-link>
                        <a href="" @click.prevent="deletecategory(posts.id)" class="badge bg-danger">DELETE</a>
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
        
    },
}
</script>
<style  scoped>

</style>