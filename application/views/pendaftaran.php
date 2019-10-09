<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('sub/header');
	$this->load->view('sub/menu');
?>

	<!--Form pendaftaran-->
	<div class="container load" style="margin-top: 70px;">
     
		<!--Alert-->
      	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
		
		<!--Form pendafaran-->
      	<h4 class="judul-form"><a href="<?php echo base_url('Controller'); ?>"><span class="glyphicon glyphicon-chevron-left"></span>Form pendaftaran</a></h4>
      	<?= form_open_multipart('Controller/daftar'); ?>
        <table class="table table-bordered table-striped table-hover">
          	<tr>
            	<td>ID Pelanggan</td>
            	<td class="id-otomatis"><input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan ?>" readonly></td>
          	</tr>
          	<tr>
            	<td>Nama</td>
            	<td><input type="text" name="nama_pelanggan"><i><?php echo form_error('nama_pelanggan'); ?></i></td>
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
            	<td><input type="text" name="alamat"><i><?php echo form_error('alamat'); ?></i></td>
          	</tr>
          	<tr>
            	<td>No. hp</td>
            	<td><input type="text" name="no_hp"><i><?php echo form_error('no_hp'); ?></i></td>
          	</tr>
          	<tr>
            	<td>Username</td>
            	<td><input type="text" name="username"><i><?php echo form_error('username'); ?></i></td>
          	</tr>
          	<tr>
            	<td>Password</td>
            	<td><input type="password" name="password"><i><?php echo form_error('password'); ?></i></td>
          	</tr>
          	<tr>
            	<td>Foto</td>
            	<td><input type="file" name="foto"></td>
          	</tr>
          	<tr>
            	<td></td>
            	<td><button type="submit" class="btn btn-md btn-default"> Daftar <span class="glyphicon glyphicon-floppy-save"></span></button></td>
          	</tr>
        </table>
      	<?= form_close(); ?>
    </div><br><br><br><br><br><br><br><br><br><br>

<?php $this->load->view('sub/footer'); ?>
<?php $this->load->view('sub/modal'); ?>
<?php $this->load->view('sub/ajax'); ?>