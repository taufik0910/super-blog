<template>
    <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Posting</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" @submit.prevent="addPosting()" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Add new Title</label>
                  <input id="postId"
                    v-model="form.title"
                    placeholder="add new post"
                    type="text"
                    name="title"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                  />

                  
                  <has-error :form="form" field="title"></has-error>
                </div>

                <div class="form-group">
                  <label> Description</label>
                  <textarea id="descriptionId"
                    v-model="form.description"
                    placeholder="add new Description"
                    
                    name="description"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('description') }">
                    </textarea>
                    <has-error :form="form" field="description"></has-error>
                </div>

        <div >
                      <!-- select -->
                      <div class="form-group">
                        <label> Select Category</label>
                        <select class="custom-select"  :class="{ 'is-invalid': form.errors.has('photo') }" v-model="form.cat_id">
                           <option disabled value="">select category</option>
                          <option v-for="category in getallCategory" v-bind:key="category.id" >{{ category.cat_name }}</option>
                        </select> 
                        <has-error :form="form" field="cat_id"></has-error>
                      </div>
                    </div>
                <label> Select Photo</label>
                <div class="from-group">
                      <input type="file"
                     @change="changePhoto($event)"
                      name="photo"
                      :class="{ 'is-invalid': form.errors.has('photo') }">
                       <has-error :form="form" field="photo"></has-error>
                       <img :src="form.photo" alt="" width="160" height="160"> 
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
    name:"New",
    data() {
        return {
            form: new Form({
                title:'',
                description:'',
                cat_id:'',
                photo:'',
            })
            
            
        }

    },
    mounted() {
        this.$store.dispatch("allCategory")
    },
    computed: {
         getallCategory(){
        return this.$store.getters.getCategory
        
      },
        
    },
    methods: {
        changePhoto(event){
           let file = event.target.files[0];
           let reader = new FileReader();
          reader.onload = event => {
    // The file's text will be printed here
      this.form.photo = event.target.result
  };
  //reader.readAsText(file);
  reader.readAsDataURL(file);
  },


        addPosting() {
      this.form
        .post("/add_post")
        .then((response)=> {
          this.$router.push("/post-list");
          

          Toast.fire({
            icon: "success",
            title: "Category has Ben insert"
          });
        })
        .catch(() => {});
    }
        
    },
    
}
</script>
<style lang="stylus" scoped>

</style>