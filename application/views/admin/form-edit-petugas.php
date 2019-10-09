<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
  $this->load->view('admin/sub/menu');
?>

    <div class="container form-admin">
      <h4 class="judul-form"><a href="<?php echo base_url('C_admin'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Edit petugas</a></h4>
      <?php foreach($query as $u){ ?>
      <form action="<?php echo base_url().'C_admin/update_petugas'; ?>" method="post">
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <td>ID Petugas</td>
            <td style="color: red;"><input type="text" name="id_petugas" value="<?php echo $u->id_petugas ?>" readonly></td>
          </tr>
          <tr>
            <td>Nama petugas</td>
            <td><input type="text" name="nama_petugas" value="<?php echo $u->nama_petugas ?>"></td>
          </tr>
          <tr>
            <td>Jenis kelamin</td>
            <td><input type="text" name="jenis_kelamin" value="<?php echo $u->jenis_kelamin ?>"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td>
          </tr>
          <tr>
            <td>Foto</td>
            <td><input type="text" name="foto" value="<?php echo $u->foto ?>" readonly></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
          </tr>
        </table>
      </form> 
      <?php } ?>
    </div>