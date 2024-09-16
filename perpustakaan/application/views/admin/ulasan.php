<div class="card text-center">
	<div class="card-body">
		<h5 class="card-title">ULASAN BUKU</h5>
		<p class="card-text"><small class="text-muted"><?= $buku->judul;  ?></small></p>
	</div>
</div>

<div class="card mt-3">
	<h5 class="card-header">Tabel Ulasan</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Nama</th>
					<th>Ulasan</th>
					<th>Rating</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;  foreach($ulasan as $u): ?>
				<tr>
					<td><?= $no++  ?></td>
					<td><?= $u['nama']  ?></td>
					<td><?= $u['ulasan']  ?></td>
					<td><?= $u['rating']  ?>⭐</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
