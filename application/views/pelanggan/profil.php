<!DOCTYPE html>
<html lang="">
	<head>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/icon/paper-plane.png'); ?>">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bukaloker</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/nuzul.css'); ?>">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
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
					<a class="navbar-brand" href="<?php echo base_url('Controller'); ?>">Bukaloker.com</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url('Controller/pelamar'); ?>">Tenaga kerja</a></li>
						<li class="active"><a href="<?php echo base_url('Controller/profil'); ?>">Profil</a></li>
					</ul>
					<?php echo form_open('C_pelanggan/search') ?>
						<div class="form-group navbar-form navbar-left">
							<input type="text" class="form-control" name="k" placeholder="Search">
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Cari</button>
						</div>
					<?php echo form_close() ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						<li class="active"><a href="#">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<div class="container" style="margin-top: 60px;">
			<div class="jumbotron">
				<div class="container">
					<h1>Profil</h1>
					<p>M. Iqbal Firdaus Nuzula /TI2A /D4-TI</p>
					<p>Politeknik Negeri Malang</p>
					<img src="<?php echo base_url('assets/nuzul.png'); ?>" alt="Nuzul">
					<p><br>
						<a class="btn btn-primary btn-lg">Learn more</a>
					</p>
				</div>
			</div>
		</div>
		
		<!--footer-->
		<div class="panel panel-default">
			<div class="panel-footer col-lg-9">
				<span class="glyphicon glyphicon-check" aria-hidden="true"> Bukaloker.com</span>
			</div>
			<div class="panel-footer col-lg-3">
				<span class="glyphicon glyphicon-check" aria-hidden="true">&nbsp;&nbsp; </span>
				<span class="glyphicon glyphicon-inbox" aria-hidden="true">&nbsp;&nbsp; </span>
				<span class="glyphicon glyphicon-log-in" aria-hidden="true">&nbsp;&nbsp; </span>
				<span class="glyphicon glyphicon-random" aria-hidden="true">&nbsp;&nbsp; </span>
			</div>
		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>