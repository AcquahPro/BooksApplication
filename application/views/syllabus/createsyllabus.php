<div class="content-wrapper">
  <section class="content-header">
    <h1>
        Add Syllabus/Blueprint
      <small> Home / ADD / Syllabus/Blueprint</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">New Syllabus/Blueprint</h3>
        </div>
        <?php echo form_open_multipart('index.php/syllabus/save');?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class</label>
                <select name="classlevel" id="classLevel" class="form-control" onchange="getSubjects(this.value)">
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
                <label for="">Syllabus/Blueprint Name</label>
                <input type="text" class="form-control" name="syllabusname" placeholder="Syllabus/Blueprint Name">
                <small><?php echo form_error('syllabusname');?></small>
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
                <label for="">Type</label>
                <select name="type" class="form-control">
                <option value="">Please Select</option>
                  <option value="Syllabus">Syllabus</option>
                  <option value="Blueprint">Blueprint</option>
                </select>
                <small><?php echo form_error('type');?></small>
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
                url: "<?php echo base_url(); ?>index.php/classlevel/getSubjectsByClass?q="+selectedClass,
                method: "POST",
                data: {selectedClass:selectedClass},
                success: function(data) {
                    $('#subject').html(data);
                }
            });
        } else {
            $('#subject').html('<option value="">Select Subject</option>');
        }
      }
</script>