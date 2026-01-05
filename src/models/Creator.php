<?php
namespace Models;
class Creator {
    static function getByUser(int $uid): array {
        $st = \db()->prepare('SELECT * FROM creators WHERE user_id=?');
        $st->execute([$uid]);
        return $st->fetch() ?: die('Creator not found');
    }
}
