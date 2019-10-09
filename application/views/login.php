<?php echo form_open('Controller/login')?>
  <table class="table table-bordered table-striped table-hover">
    <tr>
      <td>Username</td>
      <td><input type="text" name="user"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="pass"></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" class="btn btn-md btn-default" name="login">Login <span class="glyphicon glyphicon-log-in"></span></button></td>
    </tr>
  </table>
<?php echo form_close()?>