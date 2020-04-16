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
            <form role="form" @submit.prevent="UpdatePosting()" enctype="multipart/form-data">
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
                      <markdown-editor 
                      id="descriptionId"
                      name="description"
                      v-model="form.description"
                      :class="{ 'is-invalid': form.errors.has('description') }">
                      </markdown-editor>
                       <has-error :form="form" field="description"></has-error>
                   </div>

               <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                                        <option disabled value="">Select One</option>
                                        <option class="" :value="category.id" v-for="category in getallCategory" v-bind:key="category.id">option {{category.cat_name}}</option>

                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>
                <label> Select Photo</label>
                <div class="from-group">
                      <input type="file"
                     @change="changePhoto($event)"
                      name="photo"
                      :class="{ 'is-invalid': form.errors.has('photo') }">
                       <has-error :form="form" field="photo"></has-error>
                       <img :src="updateImage()" alt="" width="160" height="160"> 
                    </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"Edit",
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
    created() {
          axios.get(`/edit-post/${this.$route.params.postid}`)
      .then((response)=>{
          this.form.fill(response.data.post)

      })
    },
    computed: {
         getallCategory(){
        return this.$store.getters.getCategory
        
      },
        
    },
    methods: {
        changePhoto(event){
           let file = event.target.files[0];
           console.log(file)
          if(file.size>504876){
            Swal.fire(
          'The Internet?',
         'That thing is still around?',
          'question'
     )

          }else{
            let reader = new FileReader();
            reader.onload = event => {
            this.form.photo = event.target.result
          }
           reader.readAsDataURL(file);
     };
 
  }, 
        UpdatePosting() {
      this.form.post(`/edit-post/${this.$route.params.postid}`)
        .then((response)=> {
          this.$router.push("/post-list");
          

          Toast.fire({
            icon: "success",
            title: "new post has Ben insert"
          });
        })
        .catch(() => {});
    },
    updateImage(){
        let img = this.form.photo;
        if(img.length > 100){
                return this.form.photo
        }else{
                return `uploadpath/${this.form.photo}`

        }
    }
        
    },
    
}
</script>
<style lang="stylus" scoped>

</style>