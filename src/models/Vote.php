<?php
namespace Models;
class Vote {
    static function insert(int $creatorId, string $fp): void {
        $st = \db()->prepare('INSERT INTO votes(creator_id,voter_fingerprint,created_at) VALUES (?,?,NOW())');
        $st->execute([$creatorId, $fp]);
    }
    static function topVote(): array {
        $sql = 'SELECT c.tiktok_username, COUNT(v.id) as total
                FROM creators c
                JOIN votes v ON v.creator_id = c.id
                GROUP BY c.id ORDER BY total DESC LIMIT 10';
        return \db()->query($sql)->fetchAll();
    }
}
