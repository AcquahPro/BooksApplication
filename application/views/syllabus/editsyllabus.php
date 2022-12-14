<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Syullabus/Blueprint
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <?php echo form_open_multipart('syllabus/edit/'.$syllabusedit[0]['id']);?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class</label>
                <select name="classlevel" class="form-control" onchange="getSubjects(this.value)" >
                    <option value="<?php echo $syllabusedit[0]['class']; ?>"><?php echo $syllabusedit[0]['class']; ?></option>
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
                <option value="<?php echo $syllabusedit[0]['subject']; ?>"><?php echo $syllabusedit[0]['subject']; ?></option>
                </select>
                <small><?php echo form_error('subject');?></small>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $syllabusedit[0]['name']; ?>">
                <small><?php echo form_error('name');?></small>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" class="form-control">
                <option value="<?php echo $syllabusedit[0]['type']; ?>"><?php echo $syllabusedit[0]['type']; ?></option>
                  <option value="Syllabus">Syllabus</option>
                  <option value="Blueprint">Blueprint</option>
                </select>
                <small><?php echo form_error('type');?></small>
            </div>
            <div class="form-group">
                <label for="">Medium</label>
                <select name="medium" class="form-control" >
                <option value="<?php echo $syllabusedit[0]['medium']; ?>"><?php echo $syllabusedit[0]['medium']; ?></option>
                  <option value="English">English</option>
                  <option value="Hindi">Hindi</option>
                </select>
                <small><?php echo form_error('medium');?></small>
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
        console.log(selectedClass);
        if (selectedClass != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>classlevel/getSubjectsByClass?q="+selectedClass,
                method: "POST",
                data: {selectedClass:selectedClass},
                success: function(data) {
                    //console.log(data);
                    $('#subject').html(data);
                }
            });
        } else {
            $('#subject').html('<option value="">Select Sub Category</option>');
        }
      }
</script>