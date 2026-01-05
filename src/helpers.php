<?php
function csrf(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function verify_csrf(string $token): void {
    if (!hash_equals($_SESSION['csrf'] ?? '', $token)) die('CSRF fail');
}
function redirect(string $path): void {
    header('Location: '.BASE_URL.$path); exit;
}
function extract_tiktok_video_id(string $url): ?string {
    $patterns = [
        '~https?://(?:www\.)?tiktok\.com/@[^/]+/video/(\d+)~',
        '~https?://(?:www\.)?tiktok\.com/t/\w+~',
        '~https?://vt\.tiktok\.com/\w+~',
        '~https?://vm\.tiktok\.com/\w+~',
    ];
    foreach ($patterns as $p) {
        if (preg_match($p, $url, $m)) {
            if (isset($m[1])) return $m[1];
            // short url, lakukan HEAD untuk dapatkan long url
            $long = expand_short_url($url);
            if ($long) return extract_tiktok_video_id($long);
        }
    }
    return null;
}
function expand_short_url(string $url): ?string {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_NOBODY=>true,
        CURLOPT_FOLLOWLOCATION=>true,
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_TIMEOUT=>10
    ]);
    curl_exec($ch);
    $long = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    return $long ?: null;
}
