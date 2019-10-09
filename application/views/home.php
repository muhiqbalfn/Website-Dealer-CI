<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('sub/header');
	
?>
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
			
			<a class="navbar-brand" href="<?php echo base_url('Controller'); ?>">DEALER.COM</a>
		
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Merk motor <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('Controller/motor_filter/mrk001'); ?>">Yamaha</a></li>
						<li><a href="<?php echo base_url('Controller/motor_filter/mrk002'); ?>">Honda</a></li>
						<li><a href="<?php echo base_url('Controller/motor_filter/mrk003'); ?>">Suzuki</a></li>
						<li><a href="<?php echo base_url('Controller/motor_filter/mrk004'); ?>">Kawasaki</a></li>
					</ul>
				</li>
				<li><a href="#" class="klik" id="profil">Profil</a></li>
			</ul>
			<?php echo form_open('Controller/search') ?>
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
		<!--Kombinasi-->
		<div class="container-fluid">
			<div class="col-lg-8" >
				<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-id" data-slide-to="0" class=""></li>
						<li data-target="#carousel-id" data-slide-to="1" class=""></li>
						<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img style="height: 530px; width: 900px;" src="<?php echo base_url('assets/carousel/cbr.jpg'); ?>">
							<div class="container">
								<div class="carousel-caption">
									<h3 class="nama-carousel">Honda CBR 150 R</h3>
									<p><b>Keluaran terbaru honda <code>NEW</code> Honda CBR 150 R</b></p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Preview</a></p>
								</div>
							</div>
						</div>
						<div class="item">
							<img style="height: 530px; width: 900px;" src="<?php echo base_url('assets/carousel/fino.png'); ?>">
							<div class="container">
								<div class="carousel-caption">
									<h3 class="nama-carousel">Yamaha Fino 125 CC</h3>
									<p><b>Keluaran terbaru yamaha <code>NEW</code> Yamaha Fino 125 CC</b></p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Preview</a></p>
								</div>
							</div>
						</div>
						<div class="item">
							<img style="height: 530px; width: 900px;" src="<?php echo base_url('assets/carousel/vario.jpg'); ?>">
							<div class="container">
								<div class="carousel-caption">
									<h3 class="nama-carousel">Honda Vario 125 CC</h3>
									<p><b>Keluaran terbaru honda <code>NEW</code> Honda Vario 125 CC</b></p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Preview</a></p>
								</div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
			<div class="col-lg-4">
				<div>
					<img src="<?php echo base_url('assets/motor/awal-fino.png'); ?>" class="img-responsive img-thumbnail" style="height: 260px; width: 450px; margin-bottom: 10px;">
					<img src="<?php echo base_url('assets/motor/awal-vario.jpg'); ?>" class="img-responsive img-thumbnail" style="height: 260px; width: 450px;">
				</div>
			</div>
		</div><br>
			
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

		<!--Pagination-->
		<div class="container-fluid" align="center">
			<ul class="pagination pagination">
				<li><a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="<?php echo base_url('Controller/pagination'); ?>">2</a></li>
				<li><a href="<?php echo base_url('Controller/pagination'); ?>">3</a></li>
				<li><a href="<?php echo base_url('Controller/pagination'); ?>">4</a></li>
				<li><a href="<?php echo base_url('Controller/pagination'); ?>">5</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></li>
			</ul>
		</div>
	</div><!--/.load-->

<?php $this->load->view('sub/footer'); ?>
<?php $this->load->view('sub/modal'); ?>
<?php $this->load->view('sub/ajax'); ?>