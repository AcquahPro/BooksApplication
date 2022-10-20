
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>BOOKS</b>APPLICATION</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Register </p>
        <?php echo form_open('index.php/auth/adduser'); ?>
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
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
          </div>
        </form>

      </div>
    </div>
