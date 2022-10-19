<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Books
      <small>preview of all Books</small>
    </h1>
  </section>
  <div class="row">
    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Books List</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Class</th>
              <th>Subject</th>
              <th>Action</th>
            </tr>
            <?php foreach ($books as $book): ?>
              <tr>
                <td><?php echo $book['class']; ?></td>
                <td><?php echo $book['subject']; ?></td>
                <td>
                  <a href="<?php echo base_url();?>index.php/Book/edit/<?php echo $book['bookId'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>index.php/Book/delete/<?php echo $book['bookId'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>