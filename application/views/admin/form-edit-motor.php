<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
  $this->load->view('admin/sub/menu');
?>

  <div class="container form-admin">
    <h4 class="judul-form"><a href="<?php echo base_url('C_admin'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Edit motor</a></h4>
    <?php foreach($query as $u){ ?>
    <form action="<?php echo base_url().'C_admin/update_motor'; ?>" method="post">
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <td>ID</td>
          <td style="color: red;"><input type="text" name="id_motor" value="<?php echo $u->id_motor ?>" readonly></td>
        </tr>
        <tr>
          <td>Merk</td>
          <td>
            <select name="id_merk" style="width: 175px;">
              <option value="1">Pilih merk</option>
              <?php
              foreach($merk as $data){
                echo "<option value='".$data->id_merk."'>".$data->merk."</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Type</td>
          <td>
            <select name="id_type" style="width: 175px;">
              <option value="1">Pilih type</option>
              <?php
              foreach($type as $data){
                echo "<option value='".$data->id_type."'>".$data->type."</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Tahun</td>
          <td><input type="text" name="tahun" value="<?php echo $u->tahun ?>"></td>
        </tr>
        <tr>
          <td>Warna</td>
          <td><input type="text" name="warna" value="<?php echo $u->warna ?>"></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><input type="text" name="harga" value="<?php echo $u->harga ?>"></td>
        </tr>
        <tr>
          <td>Stok</td>
          <td><input type="text" name="stok" value="<?php echo $u->stok ?>"></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td><img class="gambar" src="<?php echo base_url('assets/motor/'.$u->img_motor); ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
        </tr>
      </table>
    </form> 
    <?php } ?>
  </div>