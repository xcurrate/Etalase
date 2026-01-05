<?php ob_start() ?>
<h1>Register</h1>
<form method="post" action="<?=BASE_URL?>/register">
<input type="hidden" name="csrf" value="<?=csrf()?>">
Username: <input name="username" required><br>
Password: <input type="password" name="password" required><br>
TikTok Username: <input name="tiktok_username" required><br>
TikTok Profile URL: <input name="profile_url" type="url"><br>
<button>Register</button>
</form>
<?php
$content = ob_get_clean();
$title = 'Register';
require __DIR__.'/layout.php';
