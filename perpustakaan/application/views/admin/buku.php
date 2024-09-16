<div class="mt-3">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
		Add Buku
	</button>
	<div id="ngilang">
		<?= $this->session->flashdata('alert',true) ?>
	</div>
	<!-- Modal -->
	<form action="<?= base_url('Buku/tambah_buku')  ?>" method="post" enctype='multipart/form-data'>
		<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">FORM ADD BUKU</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Judul</label>
								<input type="text" id="nameBasic" class="form-control" placeholder="Enter Buku"
									name="judul">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Stok</label>
								<input type="text" id="nameBasic" class="form-control" placeholder="Enter Stok"
									name="stok">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Penulis</label>
								<input type="text" class="form-control" placeholder="Enter Penulis" name="penulis">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Kategori</label>
								<select name="id_kategori" class="form-control">
									<?php foreach($kategori as $p):  ?>
									<option value="<?= $p['id_kategori']  ?>"><?= $p['nama_kategori']  ?>
									</option>
									<?php endforeach;  ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Penerbit</label>
								<input type="text" class="form-control" placeholder="Enter Penerbit" name="penerbit">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Tahun Terbit</label>
								<input type="text" class="form-control" placeholder="Enter Tahun Terbit"
									name="tahun_terbit">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Foto</label>
								<input type="file" class="form-control" name="foto" accept="image/png, image/jpeg" />
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

</div>
<div class="card">
	<h5 class="card-header">Tabel Buku</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Judul</th>
					<th>Stok</th>
					<th>Kategori</th>
					<!-- <th>Penerbit</th> -->
					<!-- <th>Tahun Terbit</th> -->
					<th>Status</th>
					<th>Rating</th>
					<th>Foto Buku</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php $no=1;  foreach($buku as $u): ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['judul']  ?></td>
					<td><?= $u['stok']  ?></td>
					<!-- <td><?= $u['penulis']  ?></td> -->
					<td><?= $u['nama_kategori']  ?></td>
					<!-- <td><?= $u['penerbit']  ?></td> -->
					<!-- <td><?= $u['tahun_terbit']  ?></td> -->
					<td><?= $u['status']  ?></td>
					<td><?= isset($avg_ratings[$u['id_buku']]) ? number_format($avg_ratings[$u['id_buku']], 1).'⭐' : 'Belum ada rating'; ?></td>
					<td><a href="<?= base_url('assets/buku/'.$u['foto']) ?>" target="blank">Lihat Buku</a></td>
					<td>
						<a class="btn btn-warning m-1 btn-sm" href="<?= base_url('Buku/edit_data/'.$u['id_buku']);?>"
							data-bs-toggle="modal" data-bs-target="#basicModal1<?= $no; ?>" ?>Edit</a>
						<a class="btn btn-sm btn-danger" href="<?= base_url('Buku/hapus_buku/'.$u['foto']);?>"
							onClick="return confirm('Apakah Anda Mau Menghapus Data Ini?')">Hapus</a>
						<a href="<?= base_url('Buku/detail/'.$u['id_buku']);  ?>"
							class="btn btn-sm btn-success">Detail</a>
						<a href="<?= base_url('Buku/ulasan/'.$u['id_buku']);  ?>"
							class="btn btn-sm btn-secondary">Ulasan</a>
					</td>
				</tr>
				<form action="<?= base_url('Buku/update_buku')  ?>" method="post" enctype='multipart/form-data'>
					<div class="modal fade" id="basicModal1<?= $no; ?>" tabindex="-1" aria-hidden="true"
						style="display: none;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel1">FORM Edit Buku</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Judul</label>
											<input type="hidden" name="foto" value="<?= $u['foto']; ?>">
											<!-- <input type="hidden" name="id_buku" value="<?= $u['id_buku']  ?>"> -->
											<input type="text" id="nameBasic" class="form-control"
												value="<?= $u['judul']  ?>" name="judul">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Stok</label>
											<input type="text" id="nameBasic" class="form-control"
												value="<?= $u['stok']  ?>" name="stok">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Penulis</label>
											<input type="text" class="form-control" value="<?= $u['penulis']  ?>"
												name="penulis">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Kategori</label>
											<select name="id_kategori" class="form-control">
												<?php foreach($kategori as $h):  ?>
												<option
													<?php if($h['id_kategori']==$h['id_kategori']){ echo"selected"; } ?>
													value="<?= $h['id_kategori'] ?>"><?= $h['nama_kategori'] ?>
												</option>
												<?php endforeach;  ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Penerbit</label>
											<input type="text" class="form-control" value="<?= $u['penerbit']  ?>"
												name="penerbit">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Tahun Terbit</label>
											<input type="text" class="form-control" value="<?= $u['tahun_terbit']  ?>"
												name="tahun_terbit">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Foto</label>
											<input type="file" class="form-control" name="foto"
												accept="image/png, image/jpeg" />
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
	</div>
	</form>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
</div>
