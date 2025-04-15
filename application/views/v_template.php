<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>KRIYA KITA</title>
	<!-- BOOTSTRAP STYLES-->
	<!-- <link href="<?= base_url('binary-admin/') ?>assets/css/bootstrap.css" rel="stylesheet" /> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!-- FONTAWESOME STYLES-->
	<link href="<?= base_url('binary-admin/') ?>assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="<?= base_url('binary-admin/') ?>assets/css/custom.css" rel="stylesheet" />

	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<style>
		body {
			font-family: 'Poppins', sans-serif;
		}
	</style>

	<!-- library leaflet-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">

	</script>
</head>

<body>

	<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
		<div class="container">
			<a href="<?= base_url('gis/index') ?>" class="navbar-brand">
				<!-- <img src="<?= base_url('binary-admin/') ?>assets/img/orang.png" class="user-image" /> -->
				Kriya Kita
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">

					</li>
					<li class="nav-item">
						<a href="<?= base_url('gis/index') ?>" class="nav-link"><i class="fa fa-desktop"></i> HOME</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('gis/geojson') ?>" class="nav-link"><i class="fa fa-globe"></i> MAP</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('gis/chart_data') ?>" class="nav-link"><i class="fa fa-bars"></i> CHART</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h2><?= $judul ?></h2>
				<h5>Selamat Datang di WebGIS Pemetaan Ekonomi Kreatif Sub Sektor Kriya Kota Bandung.</h5>
			</div>
		</div>
		<hr />
		<?php
		if ($page) {
			$this->load->view($page);
		}
		?>
	</div>
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

	<!-- JQUERY SCRIPTS -->
	<!-- BOOTSTRAP SCRIPTS -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<!-- <script src="<?= base_url('binary-admin/') ?>assets/js/bootstrap.min.js"></script> -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="<?= base_url('binary-admin/') ?>assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="<?= base_url('binary-admin/') ?>assets/js/custom.js"></script>
</body>

</html>