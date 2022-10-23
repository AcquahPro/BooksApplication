
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>BOOKS</b>APPLICATION</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Log in </p>
        <?php //echo form_open('index.php/auth/login'); ?>
        <form action="<?php echo base_url('index.php/auth/login') ?>" method="POST">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
          </div>
        </form>

      </div>
    </div>


