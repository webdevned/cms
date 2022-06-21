<?php

declare(strict_types=1);

namespace App\Controller;

class LogoutController {
    public function index() {
        unset($_SESSION['user']);

        header("Location: /?page=login");
    }
}