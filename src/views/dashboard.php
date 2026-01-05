<?php ob_start() ?>
<h1>Dashboard</h1>
<h2>Submit Video</h2>
<form method="post" action="<?=BASE_URL?>/video/submit">
<input type="hidden" name="csrf" value="<?=csrf()?>">
TikTok URL: <input name="url" type="url" required>
<button>Submit</button>
</form>

<h2>Video Anda</h2>
<table>
<tr><th>URL</th><th>Dibuat</th></tr>
<?php foreach ($videos as $v): ?>
<tr><td><a href="<?=htmlspecialchars($v['video_url'])?>" target="_blank">Link</a></td><td><?=$v['created_at']?></td></tr>
<?php endforeach; ?>
</table>
<?php
$content = ob_get_clean();
$title = 'Dashboard';
require __DIR__.'/layout.php';
