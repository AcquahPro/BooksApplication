<h2><?php //echo $title; ?></h2>

<?php echo validation_errors(); ?>

<!-- <?php echo form_open('index.php/book/saveBook'); ?>

    <label for="class">Class</label>
    <input type="text" name="class" /><br />

    <label for="text">Subject</label>
    <input type="text" name="subject" /><br />

    <input type="submit" name="submit" value="Create new Book" />

</form> -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add
      <small>add a new book</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">New Book</h3>
        </div>
        <?php echo form_open('index.php/book/saveBook'); ?>
            <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Class</label>
                <input type="text" class="form-control" name="class" placeholder="Class">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div> -->

            </div><!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>