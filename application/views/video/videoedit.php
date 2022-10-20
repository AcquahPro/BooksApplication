
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Video
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <?php echo form_open_multipart('index.php/video/edit/'.$videoedit[0]['id']);?>
            <div class="box-body">
                <div class="form-group">
                    <label for="">Class</label>
                    <select name="classlevel" class="form-control" onchange="getSubjects(this.value)" >
                        <option value="<?php echo $videoedit[0]['class']; ?>"><?php echo $videoedit[0]['class']; ?></option>
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
                    <option value="<?php echo $videoedit[0]['subject']; ?>"><?php echo $videoedit[0]['subject']; ?></option>
                    </select>
                    <small><?php echo form_error('subject');?></small>
                </div>
                <div class="form-group">
                    <label for="">Video Name</label>
                    <input type="text" class="form-control" name="videoname" value="<?php echo $videoedit[0]['videoname']; ?>">
                    <small><?php echo form_error('videoname');?></small>
                </div>
                <div class="form-group">
                    <label for="">Medium</label>
                    <select name="medium" class="form-control" >
                    <option value="<?php echo $videoedit[0]['medium']; ?>"><?php echo $videoedit[0]['medium']; ?></option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                    </select>
                    <small><?php echo form_error('medium');?></small>
                </div>
                <div class="form-group">
                    <label for="">Video Link</label>
                    <input type="text" class="form-control" name="videolink" value="<?php echo $videoedit[0]['videolink']; ?>">
                    <small><?php echo form_error('videolink');?></small>
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