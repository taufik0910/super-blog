<template>
    <section class="content">
    <div class="row justify-content-around">
      
          <div class="col-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Posts List</h3>

                <div class="card-tools">
                  <button class="btn btn-primary"> 
                  <router-link to="/add_post" style="color:#fff">Add Post</router-link>
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SI</th>
                      <th>User </th>
                      <th>Title</th>
                      <th>Description </th>
                      <th>Photo </th>
                      <th>Actions</th> 
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr >
                    <td>1</td>
                    <td>category user</td>
                     <td>Post Title</td>
                     <td>Post Description</td>
                     <td>photo</td>
                      <td> 
                        <router-link class="badge bg-success" to="/edit_post/">EDIT</router-link>
                        <a href=""  class="badge bg-danger">DELETE</a>
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
    name:"List"
    
}
</script>
<style lang="stylus" scoped>

</style>