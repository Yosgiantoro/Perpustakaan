<div class="mt-3">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
		Add Kategori
	</button>
	<div id="ngilang">
		<?= $this->session->flashdata('alert',true) ?>
	</div>
	<!-- Modal -->
	<form action="<?= base_url('Buku/tambah_kategori')  ?>" method="post">
		<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">FORM ADD Kategori</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Nama Kategori</label>
								<input type="text" id="nameBasic" class="form-control" placeholder="Enter Nama Kategori"
									name="nama_kategori">
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
	<h5 class="card-header">Tabel Kategori</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Nama Kategori</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;  foreach($kategori as $u): ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['nama_kategori']  ?></td>
					<td>
						<a class="btn btn-warning m-1 btn-sm" href="<?= base_url('Buku/edit_data/'.$u['id_kategori']);?>"
							data-bs-toggle="modal" data-bs-target="#basicModal1<?= $no; ?>"
							?>Edit</a>
						<a href="<?= base_url('Buku/hapus_kategori/'.$u['id_kategori'])  ?>" class="btn btn-sm btn-danger"
							onClick="return confirm('Apakah Anda Mau Menghapus Data Ini?')">Hapus</a>
					</td>
				</tr>
                <form action="<?= base_url('Buku/update')  ?>" method="post">
				<div class="modal fade" id="basicModal1<?= $no; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel1">FORM Edit Kategori</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label for="nameBasic" class="form-label">Nama Kategori</label>
                                        <input type="hidden" name="id_kategori" value="<?= $u['id_kategori']  ?>">
										<input type="text" id="nameBasic" class="form-control"
										    value="<?= $u['nama_kategori']  ?>" name="nama_kategori">
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
				<?php endforeach; ?>
			</tbody>
		
		</table>
	</div>
</div>
