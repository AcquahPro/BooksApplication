<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add
      <small>add a new Topper</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">New Topper</h3>
        </div>
        <?php echo form_open_multipart('topper/save');?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class</label>
                <select name="classlevel" class="form-control" onchange="getSubjects(this.value)">
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

                <select name="subject" id="subject" class="form-control">
                <option value="">Please Select</option>

                </select>
                <small><?php echo form_error('subject');?></small>
            </div>
            <div class="form-group">
                <label for="">Topper Name</label>
                <input type="text" class="form-control" name="toppername" placeholder="Topper Name">
                <small><?php echo form_error('toppername');?></small>
            </div>
            <div class="form-group">
                <label for="">Medium</label>
                <select name="medium" class="form-control">
                <option value="">Please Select</option>
                  <option value="English">English</option>
                  <option value="Hindi">Hindi</option>
                </select>
                <small><?php echo form_error('medium');?></small>
            </div>
            <div class="form-group">
                <label for="">Year</label>
                <input type="text" class="form-control" name="year" placeholder="year">
                <small><?php echo form_error('year');?></small>
            </div>
            <div class="form-group">
                <label for="">Upload Pdf</label>
                <input type="file" name="pdffile" class="form-control"/>
                <small><?php if(isset($error)){echo $error;}?></small>
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

<script>
  
      function getSubjects(selectedClass){
        if (selectedClass != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>classlevel/getSubjectsByClass?q="+selectedClass,
                method: "POST",
                data: {selectedClass:selectedClass},
                success: function(data) {
                    $('#subject').html(data);
                }
            });
        } else {
            $('#subject').html('<option value="">Select Sub Category</option>');
        }
      }
</script>