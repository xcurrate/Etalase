<?php
namespace Controllers;
class VideoController {
    static function submit(): void {
        \verify_csrf($_POST['csrf']);
        $url = trim($_POST['url']);
        $vid = \extract_tiktok_video_id($url);
        if (!$vid) die('Link tidak valid');
        $creator = \Models\Creator::getByUser(\Auth\id());
        try {
            \Models\Video::insert($creator['id'], $url, $vid);
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) die('Video sudah pernah disubmit');
            throw $e;
        }
        \redirect('/dashboard');
    }
}
