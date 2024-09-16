<div class="card">
	<?php  foreach($buku as $a){ ?>
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
					<li class="list-group-item"><b>Rating :</b> <?= isset($avg_ratings[$a['id_buku']]) ? number_format($avg_ratings[$a['id_buku']], 1).'⭐' : 'Belum ada rating'; ?></li>
				</ul>
			</div>
			<div class="row mt-3">
				<div class="4">
					<a href="<?= base_url('buku')  ?>" class="btn btn-primary" >Back</a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
