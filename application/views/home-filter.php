<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('sub/header');
	$this->load->view('sub/menu');
?>

	<div class="load" style="margin-top: 70px;">
		<!--Daftar-->
		<div class="container-fluid">
			<?php foreach ($query as $key) { ?>
			<div class="col-lg-3">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr>
							<td colspan="2"><img class="gambar-produk img-thumbnail" src="<?php echo base_url('assets/motor/'.$key->img_motor); ?>"></td>
						</tr>
						<tr><td colspan="2"><?php echo $key->merk ?> <?php echo $key->type ?></td></tr>
						<tr><td>Tahun : <?php echo $key->tahun ?></td><td>Warna : <?php echo $key->warna ?></td></tr>
						<tr><td>Stok : <?php echo $key->stok ?></td><td>Rp. <?php echo $key->harga ?></td></tr>
						<tr>
							<td><button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#myModal-login">
									&nbsp;&nbsp;&nbsp; Pesan &nbsp;&nbsp;&nbsp;
								</button>
							</td>
							<td>
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
								<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php } ?>
		</div>
	</div><br><br><br><br><br><br><br>

<?php $this->load->view('sub/footer'); ?>
<?php $this->load->view('sub/modal'); ?>
<?php $this->load->view('sub/ajax'); ?>