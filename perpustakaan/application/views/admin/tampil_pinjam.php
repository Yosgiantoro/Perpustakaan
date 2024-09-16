<div id="ngilang">
	<?=  $this->session->flashdata('alert',true) ?>
</div>
<div class="card">
	<h5 class="card-header">Detail Peminjaman</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Kode Peminjaman</th>
					<th>Nama Peminjam</th>
					<th>Buku</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					<th>Status Peminjaman</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;  foreach($detail as $u): ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['kode']  ?></td>
					<td><?= $u['nama']  ?></td>
					<td><?= $u['judul']  ?></td>
					<td><?= $u['tanggal_peminjaman']  ?></td>
					<td><?= $u['tanggal_pengembalian']  ?></td>
					<td><?php  if($u['status_peminjaman']=='dipinjam'){  ?>
						<div class="badge bg-warning">Belum DiKembalikan</div>
						<?php  }else{ ?>
						<div class="badge bg-success">Sudah DiKembalikan</div>
						<?php  } ?>
					</td>
					<td>
						<?php if($u['status_peminjaman'] == 'dipinjam'  ) { ?>
						<form action="<?= base_url('Admin/kembali/'.$u['id_buku'])   ?>" method="post">
							<input type="hidden" name="kode" value="<?= $u['kode']  ?>">
							<button type="submit" class="btn btn-sm btn-primary">Kembalikan</button>
						</form>
						<!-- <a href="<?= base_url('Admin/kembali/'.$u['id_buku'])   ?>"
                        class="btn btn-sm btn-primary">Kembalikan</a> -->
						<?php }else{ ?>
						<a href="<?= base_url('Admin/peminjaman')  ?>" class="btn btn-sm btn-secondary">Back</a>
						<?php  } ?>

					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
