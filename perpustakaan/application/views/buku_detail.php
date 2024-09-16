		<div id="ngilang">
			<?= $this->session->flashdata('alert',true) ?>
		</div>
		<div class="card m-4">
			<?php $no=0; foreach($buku as $a){ ?>
			<div class="row mt-3 m-3 ml-0">
				<div class="col-md-4">
					<div class="card mb-4">
						<img class="card-img-top" src="<?= base_url('assets/buku/'.$a['foto'])  ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?= $a['judul']  ?></h5>
							<p class="card-text">
								<small class="text-muted"><?= $a['penerbit']  ?></small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-8">
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><b>Judul :</b> <?= $a['judul'] ?></li>
							<li class="list-group-item"><b>Penulis : </b> <?= $a['penulis'] ?></li>
							<li class="list-group-item"><b>Penerbit : </b> <?= $a['penerbit'] ?></li>
							<li class="list-group-item"><b>Tahun Terbit : </b><?= $a['tahun_terbit'] ?> </li>
							<li class="list-group-item"><b>Kategori : </b><?= $a['nama_kategori'] ?></li>
							<li class="list-group-item"><b>Status :</b> <?= $a['status'] ?></li>
							<li class="list-group-item"><b>Rating :</b>
								<?= isset($avg_ratings[$a['id_buku']]) ? number_format($avg_ratings[$a['id_buku']], 1).'⭐' : 'Belum ada rating'; ?>
							</li>
						</ul>
					</div>
					<div class="row mt-3 justify-content-start">
						<div class="col-2 pe-0" >
							<a href="#" data-bs-toggle="modal" data-bs-target="#basicModall<?= $no?>"
								class="btn btn-sm btn-outline-success">Add Ulasan</a>
						</div>
						<div class="col-2 pe-0">
							<?php if($a['stok']!=0){  ?>
							<form action="<?= base_url('PinjamBuku/add_cartt')?>" method="post">
								<input type="hidden" name="id_buku" value="<?= $a['id_buku']  ?>">
								<input type="hidden" name="jumlah" value="1">
								<button type="submit" class="btn btn-sm btn-outline-info">Add Pinjam</button>
							</form>
							<?php }else{  ?>
							<button type="button" class="btn btn-sm btn-outline-info">Tidak Tersedia</button>
							<?php }   ?>	

						</div>
						<div class="col-1 pe-0">
							<a href="<?= base_url('PinjamBuku')  ?>" class="btn btn-sm btn-outline-secondary">Back</a>
						</div>
						<div class="col-7">
						</div>
					</div>
				</div>
			</div>
			<form action="<?= base_url('PinjamBuku/tambah_pinjam')  ?>" method="post">
				<div class="modal fade" id="basicModal<?= $no; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel1">Form Peminjaman</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
										<input type="text" class="form-control" placeholder="<?= $a['judul'] ?>" readonly>
										<input type="hidden" name="id_buku" value="<?= $a['id_buku'] ?>">
									</div>
								</div>
								<div class="row">
									<div class="col mb-3">
										<label for="nameBasic" class="form-label">Tanggal Peminjaman</label>
										<input type="date" id="nameBasic" class="form-control" name="tanggal_peminjaman">
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


			<form action="<?= base_url('PinjamBuku/AddUlasan')  ?>" method="post">
				<div class="modal fade" id="basicModall<?= $no; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel1">Form Add Ulasan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Buku</label>
										<input type="text" class="form-control" placeholder="<?= $a['judul'] ?>" readonly>
										<input type="hidden" name="id_buku" value="<?= $a['id_buku'] ?>">
									</div>
								</div>
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Ulasan Anda</label>
										<textarea type="text" class="form-control" name="ulasan"></textarea>
										<input type="hidden" name="id_user"
											value="<?= $this->session->userdata('id_user') ?>">
									</div>
								</div>
								<div class="row">
									<div class="col mb-3">
										<label class="form-label">Rating Anda</label>
										<select name="rating" class="form-control">
											<option value="1">⭐</option>
											<option value="2">⭐⭐</option>
											<option value="3">⭐⭐⭐</option>
											<option value="4">⭐⭐⭐⭐</option>
											<option value="5">⭐⭐⭐⭐⭐</option>
										</select>
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
