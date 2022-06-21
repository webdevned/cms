<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;

class AdminController extends BaseController {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index() {
        if (empty($_SESSION['user'])) {
            header("Location: /?page=login");
        }

        $this->render('home_admin.html.twig', [
            'title' => 'Home',
            'user' => $this->userRepository->getUser((int) $_SESSION['user']),
            'data' => $this->userRepository->getUserList()
        ]);
    }
}