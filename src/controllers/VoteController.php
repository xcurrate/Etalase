<?php
namespace Controllers;
class VoteController {
    static function vote(): void {
        header('Content-Type: application/json');
        $creatorId = (int)($_POST['creator_id'] ?? 0);
        if (!$creatorId) die(json_encode(['ok'=>0]));
        $fingerprint = $_SERVER['REMOTE_ADDR'] . ($_SERVER['HTTP_USER_AGENT'] ?? '');
        $today = date('Y-m-d');
        try {
            \Models\Vote::insert($creatorId, $fingerprint);
            echo json_encode(['ok'=>1]);
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) echo json_encode(['ok'=>0,'msg'=>'Hanya 1 vote per hari']);
            else throw $e;
        }
    }
}
