<section class="section courses" id="buku">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="section-heading">
					<h6>Daftar Buku Perpus</h6>
					<h2>Buku</h2>
				</div>
			</div>
		</div>
		<ul class="event_filter">
			<li>
				<a class="is_active" href="#!" data-filter="*">Show All</a>
			</li>
			<?php foreach($kategori as $a){  ?>
			<li>
				<a href="#!" data-filter=".<?= $a['id_kategori'] ?>"><?= $a['nama_kategori']  ?></a>
			</li>
			<?php } ?>

		</ul>
		<div id="ngilang">
			<?= $this->session->flashdata('alert',true) ?>
		</div>
		<?php $no=0; foreach($buku as $b){  ?>
		<div class="row event_box">
			<div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 <?= $b['id_kategori']  ?>">
				<div class="events_item">
					<div class="thumb">
						<a href="#detail"><img src="<?= base_url('assets/buku/'.$b['foto'])  ?>" alt=""></a>
						<span class="category"><?= $b['nama_kategori']  ?></span>
						<a href="#" data-bs-toggle="modal" data-bs-target="#modal<?= $no ?>"><span class="price">
								<h6>+ <i class="fa-solid fa-bookmark"></i></h6>
							</span>
						</a>
						<form action="<?= base_url('Koleksi/Add')  ?>" method="post">
							<div class="modal fade" id="modal<?= $no; ?>" tabindex="-1" aria-hidden="true"
								style="display: none;">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel1">Tambahkan Buku Ke Koleksi?
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_buku" value="<?= $b['id_buku']  ?>">
											<input type="hidden" name="id_user"
												value="<?= $this->session->userdata('id_user') ?>">
											<input type="hidden" name="id_kategori" value="<?=$b['id_kategori']?>">
											<button type="submit" class="btn btn-outline-primary">Tambah</button>
											<button type="button" class="btn btn-outline-secondary"
												data-bs-dismiss="modal">
												Close
											</button>
										</div>

									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="down-content">
						<span class="author"><?=$b['penulis']  ?></span>
						<h4><?=$b['judul']  ?></h4>
						<p>Rating :
							<?= isset($avg_ratings[$b['id_buku']]) ? number_format($avg_ratings[$b['id_buku']], 1).'⭐' : 'Belum ada rating'; ?>
						</p>
						<div class="mt-2 ">
							<?php if($b['stok']!=0){  ?>
							<form action="<?= base_url('PinjamBuku/add_cart')?>" method="post">
								<input type="hidden" name="id_buku" value="<?= $b['id_buku']  ?>">
								<button type="submit" class="btn btn-sm btn-outline-info">Add Pinjam</button>
							</form>
							<?php }else{  ?>
							<button type="button" class="btn btn-sm btn-outline-info">Tidak Tersedia</button>
							<?php }   ?>	
							<a href="<?= base_url('PinjamBuku/detail/'.$b['id_buku']);  ?>"
								class="btn btn-sm btn-outline-secondary mt-1">Detail</a>
						</div>
					</div>
				</div>
			</div>
			<form action="<?= base_url('PinjamBuku/tambah_pinjam')  ?>" method="post">
				<div class="modal fade" id="basicModal<?= $no; ?>" tabindex="-1" aria-hidden="true"
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
										<label class="form-label">Nama</label>
										<input type="text" class="form-control"
											placeholder="<?= $this->session->userdata('nama') ?>" readonly>
										<input type="hidden" name="id_user"
											value="<?= $this->session->userdata('id_user') ?>">
									</div>
								</div>
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Buku</label>
										<input type="text" class="form-control" placeholder="<?= $b['judul'] ?>"
											readonly>
										<input type="hidden" name="id_buku" value="<?= $b['id_buku'] ?>">
									</div>
								</div>
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
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php $no++; } ?>
		</div>
	</div>
</section>
