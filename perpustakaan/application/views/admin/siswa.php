<div class="mt-3">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
		Add Siswa
	</button>
	<div id="ngilang">
		<?= $this->session->flashdata('alert',true) ?>
	</div>
	<!-- Modal -->
	<form action="<?= base_url('Siswa/tambah')  ?>" method="post" enctype='multipart/form-data'>
		<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">FORM ADD SISWA</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">NIS</label>
								<input type="number" class="form-control" placeholder="Input Nis" name="nis">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Nama</label>
								<input type="text" id="nameBasic" class="form-control" placeholder="Enter Name"
									name="nama">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Alamat</label>
								<input type="text" class="form-control" placeholder="Enter Alamat" name="alamat">
							</div>
						</div>
						<div class="row">
							<div class="col mb-3">
								<label class="form-label">Tanggal Lahir</label>
								<input type="date" class="form-control" placeholder="Input Tanggal Lahir "
									name="tanggal">
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
					<th>NIS</th>
					<!-- <th>Penulis</th> -->
					<th>NAMA</th>
					<!-- <th>Penerbit</th> -->
					<!-- <th>Tahun Terbit</th> -->
					<th>ALAMAT</th>
					<th>TANGGAL LAHIR</th>
					<th>Foto SISWA</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php $no=1;  foreach($siswa as $u){ ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['nis']  ?></td>
					<td><?= $u['nama']  ?></td>
					<td><?= $u['alamat']  ?></td>
                    <td><?= $u['tanggal']  ?></td>
					<td><a href="<?= base_url('assets/siswa/'.$u['foto']) ?>" target="blank">Lihat Buku</a></td>
					<td>
						<a class="btn btn-warning m-1 btn-sm" href="<?= base_url('Siswa/edit_data/'.$u['id_siswa']);?>"
							data-bs-toggle="modal" data-bs-target="#basicModal1<?= $no; ?>" ?>Edit</a>
						<a class="btn btn-sm btn-danger" href="<?= base_url('Siswa/hapus/'.$u['foto']);?>"
							onClick="return confirm('Apakah Anda Mau Menghapus Data Ini?')">Hapus</a>
					</td>
				</tr>
				<form action="<?= base_url('Siswa/update')  ?>" method="post" enctype='multipart/form-data'>
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
											<label for="nameBasic" class="form-label">Nis</label>
											<input type="hidden" name="foto" value="<?= $u['foto']; ?>">
											<input type="number" id="nameBasic" class="form-control"
												value="<?= $u['nis']  ?>" name="nis">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label for="nameBasic" class="form-label">Nama</label>
											<input type="text" id="nameBasic" class="form-control"
												value="<?= $u['nama']  ?>" name="nama">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Alamat</label>
											<input type="text" class="form-control" value="<?= $u['alamat']  ?>"
												name="alamat">
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label class="form-label">Tanggal Lahir</label>
											<input type="date" class="form-control" value="<?= $u['tanggal']  ?>"
												name="tanggal">
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
	<?php $no++;   } ?>
	</tbody>
	</table>
</div>
