<?php
require_once __DIR__.'/../src/config.php';
require_once __DIR__.'/../src/database.php';
require_once __DIR__.'/../src/auth.php';
require_once __DIR__.'/../src/helpers.php';
require_once __DIR__.'/../src/middleware.php';

spl_autoload_register(function ($c) {
    $path = __DIR__.'/../src/'.str_replace('\\','/',$c).'.php';
    if (file_exists($path)) require $path;
});

$route = $_GET['route'] ?? 'home';
$method = $_SERVER['REQUEST_METHOD'];

if ($route === 'home' && $method === 'GET') {
    Controllers\HomeController::index();
} elseif ($route === 'register' && $method === 'GET') {
    Controllers\AuthController::registerForm();
} elseif ($route === 'register' && $method === 'POST') {
    Controllers\AuthController::register();
} elseif ($route === 'login' && $method === 'GET') {
    Controllers\AuthController::loginForm();
} elseif ($route === 'login' && $method === 'POST') {
    Controllers\AuthController::login();
} elseif ($route === 'logout' && $method === 'POST') {
    Controllers\AuthController::logout();
} elseif ($route === 'dashboard' && $method === 'GET') {
    Middleware::auth();
    Controllers\HomeController::dashboard();
} elseif ($route === 'video/submit' && $method === 'POST') {
    Middleware::auth();
    Controllers\VideoController::submit();
} elseif ($route === 'vote' && $method === 'POST') {
    Controllers\VoteController::vote();
} else {
    http_response_code(404);
    echo "404";
}
