<h2><?php //echo $title; ?></h2>

<?php echo validation_errors();
    $action = 'index.php/book/edit'.'/'. $bookForEdit[0]['bookId'];
 ?>

<!-- <?php echo form_open($action); ?>

    <label for="class">Class</label>
    <input type="text" name="class" value="<?php echo $bookForEdit[0]['class']; ?>"/><br />

    <label for="text">Subject</label>
    <input type="text" name="subject" value="<?php echo $bookForEdit[0]['subject']; ?>"/><br />

    <input type="submit" name="submit" value="Update Book" />

</form> -->

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit
      <small>edit a book</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Book</h3>
        </div>
        <?php echo form_open($action); ?>
            <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Class</label>
                <input type="text" class="form-control" name="class" value="<?php echo $bookForEdit[0]['class']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Subject</label>
                <input type="text" class="form-control" name="subject" value="<?php echo $bookForEdit[0]['subject']; ?>">
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div> -->

            </div><!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>