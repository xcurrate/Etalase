<?php
namespace Controllers;
class AuthController {
    static function registerForm(): void {
        require __DIR__.'/../views/register.php';
    }
    static function register(): void {
        \verify_csrf($_POST['csrf']);
        $user = trim($_POST['username']);
        $pass = $_POST['password'];
        $tiktok = trim($_POST['tiktok_username']);
        $prof = trim($_POST['profile_url']);
        if (!$user || !$pass || !$tiktok) {
            die('Field required');
        }
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $pdo = \db();
        try {
            $pdo->beginTransaction();
            $st = $pdo->prepare('INSERT INTO users(username,password_hash,created_at) VALUES (?,?,NOW())');
            $st->execute([$user, $hash]);
            $uid = $pdo->lastInsertId();
            $st = $pdo->prepare('INSERT INTO creators(user_id,tiktok_username,profile_url) VALUES (?,?,?)');
            $st->execute([$uid, $tiktok, $prof]);
            $pdo->commit();
            \Auth\login($uid);
            \redirect('/dashboard');
        } catch (\PDOException $e) {
            $pdo->rollBack();
            if ($e->getCode() == 23000) die('Username sudah ada');
            throw $e;
        }
    }
    static function loginForm(): void {
        require __DIR__.'/../views/login.php';
    }
    static function login(): void {
        \verify_csrf($_POST['csrf']);
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $st = \db()->prepare('SELECT id,password_hash FROM users WHERE username=?');
        $st->execute([$user]);
        $row = $st->fetch();
        if ($row && password_verify($pass, $row['password_hash'])) {
            \Auth\login($row['id']);
            \redirect('/dashboard');
        }
        die('Invalid login');
    }
    static function logout(): void {
        \Auth\logout();
        \redirect('/');
    }
}
