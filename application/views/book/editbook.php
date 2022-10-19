<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit
      <small>Edit Book</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Book</h3>
        </div>
        <?php echo form_open_multipart('index.php/book/edit/'.$bookForEdit[0]['bookId']);?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class</label>
                <select name="classlevel" id="classLevel" class="form-control">
                    <option value="<?php echo $bookForEdit[0]['class']; ?>"><?php echo $bookForEdit[0]['class']; ?></option>
                    <?php foreach($allclasses as $c) { 
                        ?>
                            <option value="<?php echo $c['name']; ?>"><?php echo $c['name']; ?></option>
                    <?php } ?>
                </select>
                <small><?php echo form_error('class');?></small>
            </div>
           
            <div class="form-group">
                <label for="">Subject Name</label>
                <input type="text" class="form-control" name="subject" value="<?php echo $bookForEdit[0]['subject']; ?>">
                <small><?php echo form_error('subject');?></small>
            </div>
            
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>
