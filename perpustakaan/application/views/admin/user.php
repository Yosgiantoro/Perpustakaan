<div class="mt-3">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
		Add User
	</button>
        <div id="ngilang">
            <?= $this->session->flashdata('alert',true) ?>
        </div>
	<!-- Modal -->
    <form action="<?= base_url('User/tambah')  ?>" method="post">
	<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel1">FORM ADD USER</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col mb-3">
							<label for="nameBasic" class="form-label">Nama</label>
							<input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" name="nama">
						</div>
					</div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username">
                        </div>
                        <div class="col mb-0">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>
                    
                    </div>
					<div class="row g-2">
						<div class="col mb-0">
							<label for="emailBasic" class="form-label">Email</label>
							<input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx" name="email">
						</div>
						<div class="col mb-0">
                            <label class="form-label">Role User</label>
							<select name="role_user" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Peminjam">Peminjam</option>
                            </select>
						</div>
					</div>
                    <div class="row">
						<div class="col mb-3">
							<label  class="form-label">Alamat</label>
							<input type="text" class="form-control" placeholder="Enter Alamat" name="alamat">
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
	<h5 class="card-header">Tabel User</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                <?php $no=1;  foreach($user as $u): ?>
				<tr>
				    <td><?= $no++  ?></td>
                    <td><?= $u['nama']  ?></td>
                    <td><?= $u['username']  ?></td>
                    <td><?= $u['email']  ?></td>
                    <td><?= $u['alamat']  ?></td>
                    <td><?= $u['role_user']  ?></td>
                    <td>
                        <a href="<?= base_url('User/hapus/'.$u['id_user'])  ?>" class="btn btn-sm btn-danger" 
                        onClick="return confirm('Apakah Anda Mau Menghapus Data Ini?')">Hapus</a>
                    </td>
				</tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
