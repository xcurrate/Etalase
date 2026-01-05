<?php ob_start() ?>
<h1>Papan Peringkat Kreator TikTok</h1>

<section>
<h2>Top Produktif</h2>
<table>
<tr><th>Kreator</th><th>Jumlah Video</th></tr>
<?php foreach ($tops['produktif'] as $r): ?>
<tr><td><?=htmlspecialchars($r['tiktok_username'])?></td><td><?=$r['total']?></td></tr>
<?php endforeach; ?>
</table>
</section>

<section>
<h2>Top Mingguan</h2>
<table>
<tr><th>Kreator</th><th>Video 7 hari</th></tr>
<?php foreach ($tops['mingguan'] as $r): ?>
<tr><td><?=htmlspecialchars($r['tiktok_username'])?></td><td><?=$r['total']?></td></tr>
<?php endforeach; ?>
</table>
</section>

<section>
<h2>Top View</h2>
<table>
<tr><th>Kreator</th><th>Total View</th></tr>
<?php foreach ($tops['view'] as $r): ?>
<tr><td><?=htmlspecialchars($r['tiktok_username'])?></td><td><?=$r['total']?></td></tr>
<?php endforeach; ?>
</table>
</section>

<section>
<h2>Top Vote</h2>
<table>
<tr><th>Kreator</th><th>Vote</th></tr>
<?php foreach ($tops['vote'] as $r): ?>
<tr><td><?=htmlspecialchars($r['tiktok_username'])?></td><td><?=$r['total']?></td></tr>
<?php endforeach; ?>
</table>
</section>

<?php
$content = ob_get_clean();
$title = 'Home';
require __DIR__.'/layout.php';
