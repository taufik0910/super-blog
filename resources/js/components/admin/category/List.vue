<template>
<section class="content">
    <div class="row justify-content-around">
      
          <div class="col-8">
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
                      <th>Category </th>
                      <th>Date </th>
                      <th>Actions</th> 
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(category,index) in getallCategory" :key="category.id" >
                    <td>{{index+1}}</td>
                    <td>{{category.cat_name}}</td>
                     <td>{{category.created_at | timeformat}}</td>
                      <td>
                      <router-link class="badge bg-success" :to=" `/edit_category/ ${category.id}`">EDIT</router-link>
                        <a href="" @click.prevent="deletecategory(category.id)" class="badge bg-danger">DELETE</a>
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
       this.$store.dispatch("allCategory")

    }, computed: {
      getallCategory(){
        return this.$store.getters.getCategory
        
      }
      
    }, methods: {
      deletecategory(id){
      axios.get('/category/'+id) 
      .then(()=>{
         this.$store.dispatch("allCategory")
        Toast.fire({
    icon: 'success',
    title: 'Deleted in successfully'
})
      }).catch(()=>{

      })    
      }
      
    }

    
}
</script>
<style scoped>

</style>