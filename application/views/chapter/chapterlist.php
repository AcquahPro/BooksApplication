<h2><?php //echo $title; ?></h2>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Chapters
      <small>preview of all chapters</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Chapter List</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Subject</th>
              <th>Chapter Name</th>
              <th>Class</th>
              <th>Medium</th>
              <th>File</th>
              <th>Action</th>
            </tr>
            <?php foreach ($chapters as $chapter): ?>
              <tr>
                <td><?php echo $chapter['subject']; ?></td>
                <td><?php echo $chapter['chaptername']; ?></td>
                <td><?php echo $chapter['classLevel']; ?></td>
                <td><?php echo $chapter['medium']; ?></td>
                <td>
                    <a href="<?php echo base_url().'pdffiles/'. $chapter['pdffile'];?>" target="_blank">Show</a>
                </td>
                <td>
                  <a href="<?php echo base_url();?>index.php/Chapter/edit/<?php echo $chapter['chapterId'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>index.php/Chapter/delete/<?php echo $chapter['chapterId'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>