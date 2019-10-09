<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
  $this->load->view('admin/sub/menu');
?>

  <div class="container form-admin">
    <h4 class="judul-form"><a href="<?php echo base_url('C_admin'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Edit merk</a></h4>
    <?php foreach($query as $u){ ?>
    <form action="<?php echo base_url().'C_admin/update_merk'; ?>" method="post">
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <td>ID Merk</td>
          <td style="color: red;"><input type="text" name="id_merk" value="<?php echo $u->id_merk ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama merk</td>
          <td><input type="text" name="merk" value="<?php echo $u->merk ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
        </tr>
      </table>
    </form> 
    <?php } ?>
  </div>