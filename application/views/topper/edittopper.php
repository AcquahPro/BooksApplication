<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Topper
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <?php echo form_open_multipart('topper/edit/'.$topperedit[0]['id']);?>
            <div class="box-body">
                <div class="form-group">
                    <label for="">Class</label>
                    <select name="classlevel" class="form-control" onchange="getSubjects(this.value)" >
                        <option value="<?php echo $topperedit[0]['class']; ?>"><?php echo $topperedit[0]['class']; ?></option>
                        <?php foreach($allclasses as $c) { 
                            ?>
                                <option value="<?php echo $c['name']; ?>"><?php echo $c['name']; ?></option>
                        <?php } ?>
                    </select>
                    <small><?php echo form_error('classlevel');?></small>
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <select name="subject" id="subject" class="form-control" >
                    <option value="<?php echo $topperedit[0]['subject']; ?>"><?php echo $topperedit[0]['subject']; ?></option>
                    </select>
                    <small><?php echo form_error('subject');?></small>
                </div>
                <div class="form-group">
                    <label for="">Topper Name</label>
                    <input type="text" class="form-control" name="toppername" value="<?php echo $topperedit[0]['toppername']; ?>">
                    <small><?php echo form_error('toppername');?></small>
                </div>
                <div class="form-group">
                    <label for="">Medium</label>
                    <select name="medium" class="form-control" >
                    <option value="<?php echo $topperedit[0]['medium']; ?>"><?php echo $topperedit[0]['medium']; ?></option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                    </select>
                    <small><?php echo form_error('medium');?></small>
                </div>
                <div class="form-group">
                    <label for="">Year</label>
                    <input type="text" class="form-control" name="year" value="<?php echo $topperedit[0]['year']; ?>">
                    <small><?php echo form_error('year');?></small>
                </div>
                <div class="form-group">
                    <label for="">Upload Pdf</label>
                    <input type="file" name="pdffile" class="form-control"/>
                    <small><?php if(isset($error)){echo $error;}?></small>
                </div>
            </div>
            
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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