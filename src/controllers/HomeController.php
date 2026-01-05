<?php
namespace Controllers;
class HomeController {
    static function index(): void {
        $tops = [
            'produktif' => \Models\Video::topProduktif(),
            'mingguan'  => \Models\Video::topMingguan(),
            'view'      => \Models\Video::topView(),
            'vote'      => \Models\Vote::topVote(),
        ];
        require __DIR__.'/../views/home.php';
    }
    static function dashboard(): void {
        $uid = \Auth\id();
        $creator = \Models\Creator::getByUser($uid);
        $videos = \Models\Video::getByCreator($creator['id']);
        require __DIR__.'/../views/dashboard.php';
    }
}
