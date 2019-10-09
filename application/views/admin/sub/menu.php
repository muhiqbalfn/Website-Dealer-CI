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
			<a class="navbar-brand dealer" href="<?php echo base_url('C_admin'); ?>">Admin LTE</a>
			<a id="tombol" class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>

			<ul class="nav navbar-nav navbar-right">
				<li><img class="foto-pelanggan img-circle" src="<?php echo base_url('assets/foto/male.png'); ?>"></li>
				<li class="active" onclick="return confirm('Anda yakin ingin keluar ?')">
					<a href="<?php echo base_url("C_admin/logout"); ?>">Logout <span class="glyphicon glyphicon-log-out"></span></a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>