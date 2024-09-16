<form action="<?= base_url('CobaLogin/tambah') ?>" method="post">
	<div class="row">
		<input type="text" name="username" placeholder="username">
	</div>
	<div class="row">
		<input type="text" name="nama" placeholder="nama">
	</div>
	<div class="row">
		<input type="password" name="password" placeholder="password">
	</div>
	<div class="row">
		<button type="submit">regis</button>
		<a href="<?= base_url('CobaLogin')  ?>">punya akun?login sini.</a>
	</div>
</form>
