<?php ob_start() ?>
<h1>Login</h1>
<form method="post" action="<?=BASE_URL?>/login">
<input type="hidden" name="csrf" value="<?=csrf()?>">
Username: <input name="username" required><br>
Password: <input type="password" name="password" required><br>
<button>Login</button>
</form>
<?php
$content = ob_get_clean();
$title = 'Login';
require __DIR__.'/layout.php';
