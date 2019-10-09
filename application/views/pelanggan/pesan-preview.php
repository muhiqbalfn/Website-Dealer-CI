<!DOCTYPE html>
<html lang="">
	<head>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/icon/nuzul.png'); ?>">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuzul</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
	</head>
	<body>

		<!--navbar-->
		<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dealer.com</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<b>Wellcome, </b><?php echo $this->session->userdata('nama_pelanggan') ?> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Profil <span class="glyphicon glyphicon-user pull-right"></span></a></li>
								<li onclick="return confirm('Anda yakin ingin keluar ?')">
									<a href="<?php echo base_url("C_pelanggan/logout"); ?>">Logout <span class="glyphicon glyphicon-log-out pull-right"></span></a>
								</li>
							</ul>
						</li>
						<li><img class="foto-pelanggan img-rounded" src="<?php echo base_url('assets/foto/'); ?><?php echo $this->session->userdata('foto') ?>"></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		
		<div class="container" style="margin-top: 80px;">
			<div class="table-responsive" align="center">
				<table class="table table-preview table-bordered table-striped table-hover">
					<?php foreach($query as $u){ ?>
					<tr><td colspan="3"><p>Yamaha vixion 250 CC</p></td></tr>
					<tr><td colspan="3"></td></tr>
					<tr><td rowspan="9"><img class="img-thumbnail img-preview" src="<?php echo base_url('assets/motor/'); ?><?php echo $u->img_motor ?>"></td></tr>
					<tr><td class="a" colspan="2">Nama merk : <b><?php echo $u->merk ?></b></td></tr>
					<tr><td class="a" colspan="2">Nama type : <b><?php echo $u->type ?></b></td></tr>
					<tr><td class="a" colspan="2">Tahun produksi : <b><?php echo $u->tahun ?></b></td></tr>
					<tr><td class="a" colspan="2">Warna produk : <b><?php echo $u->warna ?></b></td></tr>
					<tr><td class="a" colspan="2">Harga produk : <span class="badge" style="background-color: #32CD32;">Rp <?php echo $u->harga ?></span></td></tr>
					<tr><td class="a" colspan="2">Sisa stok : <b><?php echo $u->stok ?></b></td></tr>
						
						<?= form_open_multipart('C_pelanggan/pesan_transaksi/'); ?>

					<tr><td class="a" colspan="2">Jumlah produk yang dibeli : 
							<select name="jumlah" style="width: 100px;">
								<?php for ($i=1; $i <= $u->stok - 1; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> Produk</option>
								<?php } ?> 
				            </select>
						</td>
					</tr>
					<tr>
							<?php 
								//tgl hari ini
								$N = date('Y-m-d'); 
								$next = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
								$nextN = date("Y-m-d", $next);
							?>
							
							<!--produk-->
							<input class="hide" type="text" name="harga" value="<?php echo $u->harga ?>">
							<!--transaksi-->
							<input class="hide" type="text" name="id_transaksi" value="<?= $id_transaksi; ?>">
							<input class="hide" type="text" name="id_pelanggan" value="<?php echo $this->session->userdata('id_pelanggan') ?>">
							<input class="hide" type="text" name="id_petugas" value="ptg001">
							<input class="hide" type="text" name="tgl_pesan" value="<?php echo $N; ?>">
							<input class="hide" type="text" name="tgl_kirim" value="<?php echo $nextN; ?>">
							<!--detail_transaksi-->
							<input class="hide" type="text" name="id_detail_transaksi" value="<?= $id_det_transaksi; ?>">
							<input class="hide" type="text" name="id_motor" value="<?php echo $u->id_motor ?>">
							<td><button type="submit" class="btn btn-sm btn-info btn-block">Pesan</button></td>
						<?= form_close(); ?>
						<td><a href="<?php echo base_url('C_pelanggan'); ?>" class="btn btn-sm btn-danger btn-block"> Batal </a></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div><br><br><br><br><br><br><br>

		<!--footer-->
		<div class="panel panel-default">
			<div class="panel-footer col-lg-9">
				<span class="glyphicon glyphicon-check" aria-hidden="true"> MuhammadIqbal</span>
			</div>
			<div class="panel-footer col-lg-3">
				<span class="glyphicon glyphicon-icon" aria-hidden="true"></span>
			</div>
		</div>

		<style type="text/css">
			.navbar-brand{ font-family: Impact, Charcoal, sans-serif; font-size: 25px; }
			.foto-pelanggan{ width: 45px; height: 45px; margin-top: 2px;}
			.table-preview{ width: 90%; }
			.a{ width: 56%; }
			.img-preview{ width: 430px; height: 300px; }
			p{ font-family: Impact, Charcoal, sans-serif; font-size: 25px; }
		</style>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- Bootstrap autohiding-navbar-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-autohidingnavbar/4.0.0/jquery.bootstrap-autohidingnavbar.js"></script>

		<script type="text/javascript">
			//autohiding-navbar
			$(".navbar-fixed-top").autoHidingNavbar({
			  // see next for specifications
			});
		</script>

	</body>
</html>