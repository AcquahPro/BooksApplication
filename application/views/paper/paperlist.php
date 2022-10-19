<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Papers
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
              <th>Paper Name</th>
              <th>Medium</th>
              <th>Year</th>
              <th>Type</th>
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($papers as $p): ?>
              <tr>
                <td><?php echo $p['class']; ?></td>
                <td><?php echo $p['subject']; ?></td>
                <td><?php echo $p['papername']; ?></td>
                <td><?php echo $p['medium']; ?></td>
                <td><?php echo $p['year']; ?></td>
                <td><?php echo $p['type']; ?></td>
                <td><a href="<?php echo base_url().'pdffiles/'. $p['pdffile'];?>" target="_blank">Show</a></td>
                <td>
                  <a href="<?php echo base_url();?>index.php/paper/edit/<?php echo $p['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>index.php/paper/delete/<?php echo $p['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>