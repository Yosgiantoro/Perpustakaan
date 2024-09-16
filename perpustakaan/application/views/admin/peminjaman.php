<div id="ngilang">
	<?= $this->session->flashdata('alert',true) ?>
</div>
<div class="row">
	<div class="col-2 ">
		<button class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">Laporan bd
			Tanggal</button>
	</div>
	<div class="col-3 m-0 p-0">
		<button class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#basicModalll">Laporan bd
			Nama</button>
		<div class="col-3"></div>
		<div class="col-3"></div>
	</div>
</div>

<form action="<?= base_url('Laporan/tanggal')  ?>" method="post">
	<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">Laporan Data Peminjam</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col mb-3">
							<label for="nameBasic" class="form-label">Tanggal Awal</label>
							<input type="date" id="nameBasic" class="form-control" name="tanggal_peminjaman">
						</div>
					</div>
					<div class="row">
						<div class="col mb-3">
							<label for="nameBasic" class="form-label">Tanggal Akhir</label>
							<input type="date" id="nameBasic" class="form-control" name="tanggal_pengembalian">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">Cari</button>
				</div>
			</div>
		</div>
	</div>
</form>


<div class="card">
	<h5 class="card-header">Data Peminjaman</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Kode Peminjaman</th>
					<th>Nama Peminjam</th>
					<th>Tanggal Peminjaman</th>
					<th>Batas Peminjaman</th>
					<th>Status Peminjaman</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;  foreach($pinjam as $u): ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['kode']  ?></td>
					<td><?= $u['nama']  ?></td>
					<td><?= $u['tanggal_awal']  ?></td>
					<td><?= $u['tanggal_akhir']  ?></td>
					<td>
						<div class="badge bg-<?= $u['status'] == 'Belum Selesai' ? 'warning' : 'success' ?>">
							<?= $u['status'] ?>
						</div>
					</td>
					<td>
						<a href="<?= base_url('Admin/tampil_detail/'.$u['kode'])   ?>"
							class="btn btn-sm btn-primary">Cek</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<form action="<?= base_url('Laporan/nama')  ?>" method="post">
		<div class="modal fade" id="basicModalll" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel1">Laporan Data Peminjam</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameBasic" class="form-label">Nama</label>
								<select name="nama" class="form-control">
									<?php foreach($user as $p ){  ?>
									<option class="form-control" value="<?= $p['id_user']  ?>"><?= $p['nama']  ?>
									</option>
									<?php  }  ?>
								</select>
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameBasic" class="form-label">Tanggal Awal</label>
									<input type="date" id="nameBasic" class="form-control" name="tanggal_peminjaman">
								</div>
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameBasic" class="form-label">Tanggal Akhir</label>
									<input type="date" id="nameBasic" class="form-control" name="tanggal_pengembalian">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div>
				</div>
			</div>
	</form>
