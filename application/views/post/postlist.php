<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Post
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
              <th>Title</th>
              <th>Description</th>
              <th>Url</th>
              <!-- <th>Date</th> -->
              <th>Action</th>
            </tr>
            <?php foreach ($posts as $p): ?>
              <tr>  
                <td><?php echo $p['name']; ?></td>
                <td><?php echo $p['description']; ?></td>
                <td><?php echo $p['posturl']; ?></td>
                <td>
                  <a href="<?php echo base_url();?>post/edit/<?php echo $p['id'];?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url();?>post/delete/<?php echo $p['id'];?>" class="btn btn-danger" onclick = "return confirm('Are you sure?')">Delete</a>
                </td>   
   
              </tr>    
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>