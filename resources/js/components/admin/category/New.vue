<template>
<div class="col-md-6">
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Category</h3>
              </div>
              <form class="form-horizontal" role="form" @onclick.prevent="categorynew()">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="CategoryId" class="">Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="CategoryId" placeholder="Add Category" v-model="form.cat_name" name="cat_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                    </div>
                  </div>
                </div>
              
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
              </form>
            </div>
          </div>
          
            
  
</template>
<script>
export default {
        name:"New",
        data() {
          return {
            form : new Form({
              cat_name: ''
            })
          }
        },
        methods: {
          categorynew(){
          this.form.post('/add-category')
          //  .then(({ data }) => { console.log(data) })
              .then((response)=>{
                console.log(Response.data)
              }).catch(()=>{
                
              })
          }
        },
}
</script>

<style lang="stylus">

</style>