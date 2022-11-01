<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Syllabus/Blueprint
      <small></small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>           
              <th>Subject</th>
              <th>Name</th>
              <th>Class</th>
              <th>Medium</th>
              <th>Type</th>               
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($syllabus as $s): ?>
              <tr>  
                <td><?php echo $s['subject']; ?></td>
                <td><?php echo $s['name']; ?></td>
                <td><?php echo $s['class']; ?></td>
                <td><?php echo $s['medium']; ?></td>
                <td><?php echo $s['type']; ?></td>
                <td><a href="<?php echo base_url().'pdffiles/'. $s['pdffile'];?>" target="_blank">Show</a></td>
                <td>
                  <a href="<?php echo base_url();?>syllabus/edit/<?php echo $s['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>syllabus/delete/<?php echo $s['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>