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

		<style type="text/css">
			.navbar-brand{ font-family: Impact, Charcoal, sans-serif; font-size: 25px; }
			.login-modal{ font-family: Impact, Charcoal, sans-serif; font-size: 25px; }
			.nama-carousel{ font-family: Impact, Charcoal, sans-serif; font-size: 25px; }
		</style>

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
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Merk motor <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('C_pelanggan/motor_filter/mrk001'); ?>">Yamaha</a></li>
								<li><a href="<?php echo base_url('C_pelanggan/motor_filter/mrk002'); ?>">Honda</a></li>
								<li><a href="<?php echo base_url('C_pelanggan/motor_filter/mrk003'); ?>">Suzuki</a></li>
								<li><a href="<?php echo base_url('C_pelanggan/motor_filter/mrk004'); ?>">Kawasaki</a></li>
							</ul>
						</li>
						<li><a href="#" class="klik" id="profil">Profil</a></li>
					</ul>
					<?php echo form_open('C_pelanggan/search') ?>
						<div class="form-group navbar-form navbar-left">
							<input type="text" class="form-control" name="k" placeholder="Merk / Type motor">
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Cari</button>
						</div>
					<?php echo form_close() ?>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo base_url('Controller/pendaftaran'); ?>">Daftar 
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</a>
						</li>
						<li><a href="#" data-toggle="modal" data-target="#myModal-login">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		
		<div class="load" style="margin-top: 70px;">
			<!--Daftar-->
			<div class="container-fluid">
				<?php foreach ($query as $key) { ?>
				<div class="col-lg-3">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<tr>
								<td colspan="2"><img class="gambar img-thumbnail img-responsive" src="<?php echo base_url('assets/motor/'.$key->img_motor); ?>"></td>
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

			<!-- Pagination
			<div class="container-fluid" align="center">
				<ul class="pagination pagination">
					<li><a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></li>
				</ul>
			</div> -->
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

		<!--modal login-->
		<div class="modal fade" id="myModal-login">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title login-modal">Login</h4>
					</div>
					<div class="modal-body">
						<?php include('login.php'); ?>
					</div>
				</div>
			</div>
		</div>


		<style type="text/css">
			.gambar{ width: 280px; height: 230px; }
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
			});

			//load halaman
			$(document).ready(function(){
				$('.klik').click(function(){
					var id = $(this).attr('id');
					if(id == "profil"){
						$('.load').load('<?php echo base_url('Controller/profil'); ?>');						
					}
				});					
			});
		</script>

	</body>
</html>