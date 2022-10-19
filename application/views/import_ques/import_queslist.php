<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Important Questions
      <small>preview of all Books</small>
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
              <th>Question Name</th>
              <th>Medium</th>
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($importantquestions as $i): ?>
              <tr>
                <td><?php echo $i['class']; ?></td>
                <td><?php echo $i['subject']; ?></td>
                <td><?php echo $i['questionname']; ?></td>
                <td><?php echo $i['medium']; ?></td>
                <td><a href="<?php echo base_url().'pdffiles/'. $i['pdffile'];?>" target="_blank">Show</a></td>
                <td>
                  <a href="<?php echo base_url();?>index.php/importantquestion/edit/<?php echo $i['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>index.php/importantquestion/delete/<?php echo $i['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>