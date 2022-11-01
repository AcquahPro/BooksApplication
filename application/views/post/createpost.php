<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add Post
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <?php echo form_open('post/save');?>
            <div class="box-body">
            
            <div class="form-group">
                <label for="">Post Name</label>
                <input type="text" class="form-control" name="name" >
                <small><?php echo form_error('name');?></small>
            </div>
            
            <div class="form-group">
                <label for="">Description</label>
                <textarea  class="form-control" name="description" rows="5" cols="10" ></textarea>
                <small><?php echo form_error('description   ');?></small>
            </div>
            
            <div class="form-group">
                <label for="">Url</label>
                <input type="text" class="form-control" name="posturl" >
                <small><?php echo form_error('posturl');?></small>
            </div>

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>