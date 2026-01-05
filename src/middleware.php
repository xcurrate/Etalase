<?php
namespace Middleware;
function auth(): void {
    if (!\Auth\id()) redirect('/login');
}
