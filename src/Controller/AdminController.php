<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;

class AdminController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (empty($_SESSION['user'])) {
            header("Location: /?page=login");
        }

        $this->render('home_admin.html.twig', [
            'title' => 'Home',
            'user' => (new UserRepository())->getUser((int) $_SESSION['user'])
        ]);
    }
}