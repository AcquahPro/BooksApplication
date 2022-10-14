<h2><?php //echo $title; ?></h2>

<a href="<?php echo base_url("book/create")?>" class="btn btn-primary float-sm-right mb-3 mr-5">Add New Book</a>

<?php foreach ($books as $book): ?>

        <h3><?php echo $book['class']; ?></h3>
        <div class="main">
                <?php echo $book['subject']; ?>
        </div>
        <a href="<?php echo base_url();?>Book/edit/<?php echo $book['bookId'];?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo base_url();?>Book/delete/<?php echo $book['bookId'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
    

<?php endforeach; ?>