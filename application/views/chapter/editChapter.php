<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit
      <small>Edit Chapter</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Chapter</h3>
        </div>
        <?php echo form_open_multipart('chapter/edit/'.$chapterForEdit[0]['chapterId']);?>
            <div class="box-body">
            <div class="form-group">
                <label for="">Class</label>
                <!-- <input type="text" class="form-control" name="subjectcategory" placeholder="Subject Category"> -->
                <select name="classlevel" id="classLevel" class="form-control" onchange="getSubjects(this.value)" >
                    <option value="<?php echo $chapterForEdit[0]['classLevel']; ?>"><?php echo $chapterForEdit[0]['classLevel']; ?></option>
                    <?php foreach($allclasses as $c) { 
                        ?>
                            <option value="<?php echo $c['name']; ?>"><?php echo $c['name']; ?></option>
                    <?php } ?>
                </select>
                <small><?php echo form_error('classlevel');?></small>
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <!-- <input type="text" class="form-control" name="subjectcategory" placeholder="Subject Category"> -->
                <select name="subject" id="subject" class="form-control" >
                <option value="<?php echo $chapterForEdit[0]['subject']; ?>"><?php echo $chapterForEdit[0]['subject']; ?></option>
                </select>
                <small><?php echo form_error('subject');?></small>
            </div>
            <div class="form-group">
                <label for="">Chapter Name</label>
                <input type="text" class="form-control" name="chaptername" placeholder="Chapter Name" value="<?php echo $chapterForEdit[0]['chaptername']; ?>">
                <small><?php echo form_error('chaptername');?></small>
            </div>
            <div class="form-group">
                <label for="">Medium</label>
                <select name="medium" class="form-control" >
                <option value="<?php echo $chapterForEdit[0]['medium']; ?>"><?php echo $chapterForEdit[0]['medium']; ?></option>
                  <option value="English">English</option>
                  <option value="Hindi">Hindi</option>
                </select>
                <small><?php echo form_error('medium');?></small>
            </div>
            <div class="form-group">
                <label for="">Upload Pdf</label>
                <input type="file" name="pdffile" class="form-control" value="<?php echo $chapterForEdit[0]['pdffile']; ?>"/>
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