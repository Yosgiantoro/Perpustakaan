<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">

	<title>Perpus</title>

	<!-- Bootstrap core CSS -->
	<link href="<?=  base_url('assets/depan/')  ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?=  base_url('assets/depan/')  ?>assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?=  base_url('assets/depan/')  ?>assets/css/templatemo-scholar.css">
	<link rel="stylesheet" href="<?=  base_url('assets/depan/')  ?>assets/css/owl.css">
	<link rel="stylesheet" href="<?=  base_url('assets/depan/')  ?>assets/css/animate.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="js-preloader" class="js-preloader">
		<div class="preloader-inner">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<a href="<?= base_url('PinjamBuku')  ?>" class="logo">
							<h1>Perpus</h1>
						</a>
						<!-- ***** Logo End ***** -->
						<!-- ***** Menu Start ***** -->
						<ul class="nav">
							<li class="scroll-to-section"><a href="<?= base_url('PinjamBuku')  ?>"
									class="active">Home</a></li>
							<li class="scroll-to-section"><a
									href="<?= base_url('PinjamBuku/keranjang')  ?>">Peminjaman</a></li>
							<li class="scroll-to-section"><a href="#buku">Buku</a></li>
							<li class="scroll-to-section"><a href="<?= base_url('Koleksi')  ?>">Koleksi</a>
							</li>
							<li class="scroll-to-section"><a href="<?= base_url('Auth/logout')  ?>">Log Out</a></li>
						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>

	<div class="main-banner" id="top">


		<div class="header-text">
		</div>
		<div class="header-text">
		</div>

		<div class="header-text">
		</div>
		<div class="col-lg-12 text-center">
			<div class="section-heading">
				<h6 style="color:black; ">Peminjaman</h6>
				<h2 style="color:white; ">Selamat Meminjam Buku</h2>
			</div>
		</div>
	</div>
	<div class="section events m-0" id="buku">
		<div id="ngilang">
			<?= $this->session->flashdata('alert',true) ?>
		</div>
		<div class="row mt-5 mb-5">
			<div class="col-1">

			</div>
			<div class="col-4">
				<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">Pinjam
					Buku</a>
				<form action="<?= base_url('PinjamBuku/tambah_pinjam')  ?>" method="post">
					<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true"
						style="display: none;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel1">Form Peminjaman</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Tanggal Peminjaman</label>
											<input type="date" id="nameBasic" class="form-control"
												name="tanggal_peminjaman">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
										Close
									</button>
									<button type="submit" class="btn btn-primary">Pinjam</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-7">

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-6">
					<?php  foreach($cart as $a ){  ?>
					<div class="item">
						<div class="row">
							<div class="col-lg-3">
								<div class="image">
									<img src="<?= base_url('assets/buku/'.$a['foto'])  ?>" alt="">
								</div>
							</div>
							<div class="col-lg-9">
								<ul>
									<li>
										<span class="category"><?=  $a['nama_kategori']  ?></span>
										<h4><?= $a['judul']  ?></h4>
									</li>
									<li>
										<span>Penulis: </span>
										<h6><?= $a['penulis']  ?></h6>
									</li>
									<li>
										<span>Penerbit:</span>
										<h6><?= $a['penerbit']  ?></h6>
									</li>
									<li>
										<span>Tahun Penerbit</span>
										<h6><?= $a['tahun_terbit']  ?></h6>
									</li>
								</ul>
								<a href="<?= base_url('PinjamBuku/hapus_pinjam/'.$a['id_temp'])  ?>"><i
										class="fa fa-trash"></i></a>
							</div>
						</div>
					</div>
					<?php  } ?>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<div class="container">
			<div class="col-lg-12">
				<p>Copyright © 2036 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a
						href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a> Distribution: <a
						href="https://themewagon.com" rel="nofollow" target="_blank">ThemeWagon</a></p>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<!-- Bootstrap core JavaScript -->
	<script src="<?=  base_url('assets/depan/')  ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?=  base_url('assets/depan/')  ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=  base_url('assets/depan/')  ?>assets/js/isotope.min.js"></script>
	<script src="<?=  base_url('assets/depan/')  ?>assets/js/owl-carousel.js"></script>
	<script src="<?=  base_url('assets/depan/')  ?>assets/js/counter.js"></script>
	<script src="<?=  base_url('assets/depan/')  ?>assets/js/custom.js"></script>
	<script>
		$('#ngilang').delay('slow').slideDown('slow').delay(4000).slideUp(600);

	</script>

</body>

</html>
