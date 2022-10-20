<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Post
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <?php echo form_open('index.php/post/edit/'.$postedit[0]['id']);?>
            <div class="box-body">
            
            <div class="form-group">
                <label for="">Post Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $postedit[0]['name']; ?>">
                <small><?php echo form_error('postname');?></small>
            </div>
            
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="5" cols="10">
                    <?php echo $postedit[0]['description']; ?>
                </textarea>
                <small><?php echo form_error('description');?></small>
            </div>
            
            <div class="form-group">
                <label for="">Url</label>
                <input type="text" class="form-control" name="posturl" value="<?php echo $postedit[0]['posturl']; ?>">
                <small><?php echo form_error('posturl');?></small>
            </div>

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>