<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="addCategory()">
              <div class="card-body">
                <div class="form-group">
                  <label>Add new Category</label>
                  <input
                    v-model="form.cat_name"
                    type="text"
                    name="cat_name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('cat_name') }"
                  />
                  <has-error :form="form" field="cat_name"></has-error>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        cat_name: ""
      })
    };
  },
  methods: {
    addCategory() {
      this.form
        .post("/add-category")
        .then((response)=> {
          this.$router.push("/category-list");
          

          Toast.fire({
            icon: "success",
            title: "Category has Ben insert"
          });
        })
        .catch(() => {});
    }
  }
};
</script>

<style scoped>
</style>