<?php

declare(strict_types=1);

namespace App\Controller;

class LogoutController extends BaseController {
    public function __construct() {
        parent::__construct();

        unset($_SESSION['user']);

        header("Location: /?page=login");
    }
}