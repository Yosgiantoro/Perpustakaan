<form action="<?= base_url('CobaLogin/login') ?>" method="post">
    <div class="row">
    <input type="text" name="username" placeholder="username">
    </div>
<div class="row">
    <input type="password" name="password" placeholder="password">
</div>
<div class="row">
 <button type="submit">Login</button>
    <a href="<?= base_url('CobaLogin/register')  ?>" >Regis</a>
</div>

</form>