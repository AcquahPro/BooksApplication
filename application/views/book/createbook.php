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
        <?php echo form_open('book/saveBook'); ?>
            <div class="box-body">
              <div class="form-group">
                  <label for="">Class</label>
                  <select name="class" id="classLevel" class="form-control" >
                      <option value="">Please Select</option>
                      <?php foreach($allclasses as $c) { 
                          ?>
                              <option value="<?php echo $c['name']; ?>"><?php echo $c['name']; ?></option>
                      <?php } ?>
                  </select>
                  <small><?php echo form_error('classlevel');?></small>
              </div>
              <div class="form-group">
                  <label for="">Subject</label>
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                  <small><?php echo form_error('subject');?></small>
              </div>
            </div>

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
   </div>
 </div>
</div>