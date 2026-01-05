<?php
namespace Auth;
function login(int $userId): void {
    session_regenerate_id(true);
    $_SESSION['uid'] = $userId;
}
function logout(): void {
    session_destroy();
}
function id(): ?int {
    return $_SESSION['uid'] ?? null;
}
