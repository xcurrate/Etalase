<?php
namespace Models;
class User {
    static function exists(string $username): bool {
        $st = \db()->prepare('SELECT 1 FROM users WHERE username=?');
        $st->execute([$username]);
        return (bool)$st->fetch();
    }
}
