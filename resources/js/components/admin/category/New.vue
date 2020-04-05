<template>
    <div >
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around ">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Category</label>
                    <input class="form-control form-control-lg" type="text" placeholder="Enter Category">
                  </div>
                 
                </div>
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        
    </div>
</template>
<script>
export default {
    name : "New"
    
}
</script>
<style  scoped>

</style>