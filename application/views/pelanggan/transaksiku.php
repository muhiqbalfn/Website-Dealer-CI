
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
					<a class="navbar-brand" href="<?php echo base_url('C_pelanggan'); ?>">Dealer.com</a>
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
				<table class="table table-preview table-bordered table-striped table-hover" style="border-left: solid;">
					<tr><td colspan="2"><p>Detail pemesanan anda.</p></td></tr>
				</table><br>

				<td>
					<a href="<?php echo base_url('C_pelanggan/print_to_pdf/'); ?><?php echo $this->session->userdata('id_pelanggan') ?>"  style="width: 150px;">
								<span class="glyphicon glyphicon-print"></span> Print
							</a>
				</td><br>
					
				<?php 
					$no = 0;
					foreach($query as $u){ 
					$no++;
				?>
				<table class="table table-preview table-bordered table-striped table-hover" style="border-left: solid;">
					<!--motor-->
					<tr><td colspan="2"><p>Data produk ke - <?php echo $no; ?></p></td></tr>
					<tr>
						<td rowspan="7"><img class="img-thumbnail img-preview" src="<?php echo base_url('assets/motor/'); ?><?php echo $u->img_motor ?>"></td>
					</tr>
					<tr><td class="a">Nama merk : <b><?php echo $u->merk ?></b></td></tr>
					<tr><td class="a">Nama type : <b><?php echo $u->type ?></b></td></tr>
					<tr><td class="a">Tahun produksi : <b><?php echo $u->tahun ?></b></td></tr>
					<tr><td class="a">Warna produk : <b><?php echo $u->warna ?></b></td></tr>
					<tr><td class="a">Harga satuan : <span class="badge" style="background-color: #32CD32;">Rp <?php echo $u->harga ?></span></td></tr>
					<tr><td class="a">Sisa stok : <b><?php echo $u->stok ?></b></td></tr>
					<tr style="height: 10px;"></tr>

					<!--transaksi-->
					<tr>
						<td><p>Data pelanggan</p></td>
						<td><p>Data pemesanan</p></td>
					</tr>
					<tr>
						<td>ID Pelanggan : <b><?php echo $u->id_pelanggan ?></b></td>
						<td>Kode transaksi : <b><?php echo $u->id_transaksi ?></b></td>
					</tr>
					<tr>
						<td>Atas nama : <b><?php echo $u->nama_pelanggan ?></b></td>
						<td>Total harga : <span class="badge" style="background-color: #32CD32;">Rp <?php echo $u->total_harga ?></span></td>
					</tr>
					<tr>
						<td>Username : <b><?php echo $u->username ?></b></td>
						<td>Tanggal pemesanan : <b><?php echo $u->tgl_pesan ?></b></td>
					</tr>
					<tr>
						<td>Jenis kelamin : <b><?php echo $u->jenis_kelamin ?></b></td>
						<td>Tanggal kirim : <b><?php echo $u->tgl_kirim ?></b></td>
					</tr>
					<tr>
						<td>Alamat : <b><?php echo $u->alamat ?></b></td>
						<td>Status pemesanan : <span class="badge <?php echo $u->status ?>"><?php echo $u->status ?></span></td>
					</tr>
					<tr>
						<td>Nomor Telephon : <b><?php echo $u->no_hp ?></b></td>
						<td>
							<a href="<?php echo base_url('C_pelanggan/edit_transaksiku/'); ?><?php echo $u->id_transaksi ?>" class="btn btn-primary btn-sm" style="width: 150px;">
								<span class="glyphicon glyphicon-edit"></span> Edit 
							</a>
							<a href="<?php echo base_url('C_pelanggan/hapus_transaksiku/'); ?><?php echo $u->id_transaksi ?>" class="btn btn-danger btn-sm" style="width: 150px;" onclick="return confirm('Anda yakin ingin membatalkan pemesanan ?')">
								<span class="glyphicon glyphicon-trash"></span> Batal
							</a>
						</td>
					</tr>
				</table>
				<?php } ?>
				
				<table class="table table-preview table-bordered table-striped table-hover" style="border-left: solid;">
					<tr>
						<?php 
						foreach($total as $u){ 
						?>
						<td>Total pembayaran : <span class="badge" style="background-color: #32CD32;"> Rp <b><?php echo $u->totalku ?></b></span></td>
						<?php } ?>
					</tr>
				</table>

				<br>

				<table class="table table-preview table-bordered table-striped table-hover" style="border-left: solid;">
					<tr>
						<td colspan="2" style="color: #A9A9A9;"><p>Terimakasih telah memesan di website kami www.dealer.com, Semoga pelayanan kami bisa memuaskan anda ! :)</p></td>
					</tr>
				</table>
			</div>
		</div><br><br><br><br>

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
			.table-tombol{ width: 50%; }
			.a{ width: 56%; }
			.img-preview{ width: 430px; height: 300px; }
			p{ font-family: Impact, Charcoal, sans-serif; font-size: 21px; }

			/*status*/
			.pesan{ background-color: red; }
			.terkirim{ background-color: #4169E1; }
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