<?php echo validation_errors(); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add
      <small>add a new class</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">New Class</h3>
        </div>
        <?php echo form_open('classlevel/save'); ?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class name</label>
                <input type="text" class="form-control" name="name" placeholder="Class Name">
            </div>
            <div class="form-group">
                <label for="">Subject Category</label>
                <!-- <input type="text" class="form-control" name="subjectcategory" placeholder="Subject Category"> -->
                <select name="subjectcategory" class="form-control">
                <option value="">Please Select</option>
                  <option value="Category A">Category A</option>
                  <option value="Category B">Category B</option>
                  <option value="Category C">Category C</option>
                  <option value="Category D">Category D</option>
                </select>
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