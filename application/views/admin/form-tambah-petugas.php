<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
  $this->load->view('admin/sub/menu');
?>
    
    <div class="container form-admin">
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <td>Validasi</td>
        </tr>
        <tr>
          <td style="color: red;"><?= validation_errors(); ?></td>
        </tr>
      </table>

      <!--Alert-->
      <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

      <h4 class="judul-form"><a href="<?php echo base_url('C_admin'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Tambah petugas</a></h4>
      <?= form_open_multipart('C_admin/create_petugas'); ?>
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <td>ID Petugas</td>
            <td style="color: red;"><input type="text" name="id_petugas" value="<?php echo $id_petugas ?>" readonly></td>
          </tr>
          <tr>
            <td>Nama petugas</td>
            <td><input type="text" name="nama_petugas"></td>
          </tr>
          <tr>
            <td>Jenis kelamin</td>
            <td>
              <input type="radio" class="form-radio" name="jenis_kelamin" value="L"> Laki-laki &nbsp;&nbsp;
              <input type="radio" class="form-radio" name="jenis_kelamin" value="P"> Perempuan
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
          </tr>
          <tr>
            <td>Foto</td>
            <td><input type="file" name="foto"></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
          </tr>
        </table>
      <?= form_close(); ?>
    </div>