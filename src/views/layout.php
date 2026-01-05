<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title><?=$title ?? 'TikTok Ranking'?></title>
<link rel="stylesheet" href="<?=BASE_URL?>/css/main.css">
</head>
<body>
<header>
    <a href="<?=BASE_URL?>">Home</a>
    <?php if (\Auth\id()): ?>
        <a href="<?=BASE_URL?>/dashboard">Dashboard</a>
        <form method="post" action="<?=BASE_URL?>/logout" style="display:inline">
            <input type="hidden" name="csrf" value="<?=csrf()?>">
            <button>Logout</button>
        </form>
    <?php else: ?>
        <a href="<?=BASE_URL?>/login">Login</a>
        <a href="<?=BASE_URL?>/register">Register</a>
    <?php endif; ?>
</header>
<main><?=$content?></main>
<script src="<?=BASE_URL?>/js/main.js"></script>
</body>
</html>
