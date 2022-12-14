<div class="content-wrapper">
  <section class="content-header">
    <h1>
        Toppers
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
              <th>Year</th>
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($toppers as $t): ?>
              <tr>
                <td><?php echo $t['subject']; ?></td>
                <td><?php echo $t['toppername']; ?></td>
                <td><?php echo $t['class']; ?></td>
                <td><?php echo $t['medium']; ?></td>
                <td><?php echo $t['year']; ?></td>
                <td><a href="<?php echo base_url().'pdffiles/'. $t['pdffile'];?>" target="_blank">Show</a></td>
                <td>
                  <a href="<?php echo base_url();?>topper/edit/<?php echo $t['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>topper/delete/<?php echo $t['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>