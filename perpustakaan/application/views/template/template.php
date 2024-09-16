<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">

	<title><?= $judul;  ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/depan/')  ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/depan/')  ?>assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?= base_url('assets/depan/')  ?>assets/css/templatemo-scholar.css">
	<link rel="stylesheet" href="<?= base_url('assets/depan/')  ?>assets/css/owl.css">
	<link rel="stylesheet" href="<?= base_url('assets/depan/')  ?>assets/css/animate.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>


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
							<li class="scroll-to-section"><a href="<?= base_url('PinjamBuku/keranjang')  ?>">Peminjaman</a></li>
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
	<!-- ***** Header Area End ***** -->

	<div class="main-banner" id="top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel owl-banner">
						<div class="item item-1">
							<div class="header-text">
								<span class="category">Our Courses</span>
								<h2>With Scholar Teachers, Everything Is Easier</h2>
								<p>Scholar is free CSS template designed by TemplateMo for online educational related
									websites. This layout is based on the famous Bootstrap v5.3.0 framework.</p>
								<div class="buttons">
									<div class="main-button">
										<a href="#">Request Demo</a>
									</div>
									<div class="icon-button">
										<a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item item-2">
							<div class="header-text">
								<span class="category">Best Result</span>
								<h2>Get the best result out of your effort</h2>
								<p>You are allowed to use this template for any educational or commercial purpose. You
									are not allowed to re-distribute the template ZIP file on any other website.</p>
								<div class="buttons">
									<div class="main-button">
										<a href="#">Request Demo</a>
									</div>
									<div class="icon-button">
										<a href="#"><i class="fa fa-play"></i> What's the best result?</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item item-3">
							<div class="header-text">
								<span class="category">Online Learning</span>
								<h2>Online Learning helps you save the time</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious
									incididunt ut labore et dolore magna aliqua suspendisse.</p>
								<div class="buttons">
									<div class="main-button">
										<a href="#">Request Demo</a>
									</div>
									<div class="icon-button">
										<a href="#"><i class="fa fa-play"></i> What's Online Course?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?=  $contents; ?>


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
	<script src="<?= base_url('assets/depan/')  ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/depan/')  ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/depan/')  ?>assets/js/isotope.min.js"></script>
	<script src="<?= base_url('assets/depan/')  ?>assets/js/owl-carousel.js"></script>
	<script src="<?= base_url('assets/depan/')  ?>assets/js/counter.js"></script>
	<script src="<?= base_url('assets/depan/')  ?>assets/js/custom.js"></script>
		<script>
		$('#ngilang').delay('slow').slideDown('slow').delay(4000).slideUp(600);

	</script>

</body>

</html>
