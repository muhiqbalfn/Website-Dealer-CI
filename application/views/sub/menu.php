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