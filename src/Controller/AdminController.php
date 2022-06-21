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

        $userRepository = new UserRepository();

        $this->render('home_admin.html.twig', [
            'title' => 'Home',
            'user' => $userRepository->getUser((int) $_SESSION['user']),
            'data' => $userRepository->getUserList()
        ]);
    }
}