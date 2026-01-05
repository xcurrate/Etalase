<?php
namespace Models;
class Video {
    static function insert(int $creatorId, string $url, string $vid): void {
        $st = \db()->prepare('INSERT INTO videos(creator_id,video_url,video_id,views,created_at) VALUES (?,?,?,0,NOW())');
        $st->execute([$creatorId, $url, $vid]);
    }
    static function getByCreator(int $cid): array {
        $st = \db()->prepare('SELECT * FROM videos WHERE creator_id=? ORDER BY created_at DESC');
        $st->execute([$cid]);
        return $st->fetchAll();
    }
    static function topProduktif(): array {
        $sql = 'SELECT c.tiktok_username, COUNT(v.id) as total
                FROM creators c
                JOIN videos v ON v.creator_id = c.id
                GROUP BY c.id ORDER BY total DESC LIMIT 10';
        return \db()->query($sql)->fetchAll();
    }
    static function topMingguan(): array {
        $sql = 'SELECT c.tiktok_username, COUNT(v.id) as total
                FROM creators c
                JOIN videos v ON v.creator_id = c.id
                WHERE v.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                GROUP BY c.id ORDER BY total DESC LIMIT 10';
        return \db()->query($sql)->fetchAll();
    }
    static function topView(): array {
        $sql = 'SELECT c.tiktok_username, SUM(v.views) as total
                FROM creators c
                JOIN videos v ON v.creator_id = c.id
                GROUP BY c.id ORDER BY total DESC LIMIT 10';
        return \db()->query($sql)->fetchAll();
    }
}
