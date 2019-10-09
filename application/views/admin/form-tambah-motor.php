<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/sub/header');
  $this->load->view('admin/sub/menu');
?>
    
  <div class="container form-admin">
    <!--Alert-->
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

    <h4 class="judul-form"><a href="<?php echo base_url('C_admin'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Tambah motor</a></h4>
    <?= form_open_multipart('C_admin/create_motor'); ?>
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <td>ID</td>
          <td style="color: red;"><input type="text" name="id_motor" value="<?php echo $id_motor ?>" readonly></td>
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
          <td><input type="text" name="tahun"><i><?php echo form_error('tahun'); ?></i></td>
        </tr>
        <tr>
          <td>Warna</td>
          <td><input type="text" name="warna"><i><?php echo form_error('warna'); ?></i></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><input type="text" name="harga"><i><?php echo form_error('harga'); ?></i></td>
        </tr>
        <tr>
          <td>Stok</td>
          <td><input type="text" name="stok"><i><?php echo form_error('stok'); ?></i></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td><input type="file" name="gambar"></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" class="btn btn-md btn-default">Simpan <span class="glyphicon glyphicon-floppy-save"></span></button></td>
        </tr>
      </table>
    <?= form_close(); ?>
  </div>