<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Notes
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
              <th>Class</th>
              <th>Subject</th>
              <th>Note Name</th>
              <th>Medium</th>
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($notes as $n): ?>
              <tr>
                <td><?php echo $n['class']; ?></td>
                <td><?php echo $n['subject']; ?></td>
                <td><?php echo $n['notename']; ?></td>
                <td><?php echo $n['medium']; ?></td>
                <td><a href="<?php echo base_url().'pdffiles/'. $n['pdffile'];?>" target="_blank">Show</a></td>
                <td>
                  <a href="<?php echo base_url();?>index.php/note/edit/<?php echo $n['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>index.php/note/delete/<?php echo $n['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>