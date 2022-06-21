<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;

class LoginController extends BaseController {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index() {
        $this->init();

        if (!empty($_POST)) {
            $this->authenticate();
        } else {
            $this->render('login.html.twig', [
                'title' => 'Login'
            ]);
        }
    }

    public function init(): void {
        // Check if user ID isset in a session
        if (!empty($_SESSION['user'])) {
            // Make sure it is still present in DB
            if (array_key_exists($_SESSION['user'], $this->userRepository->getUserList())) {
                $this->redirectToBackend();
            } else {
                unset($_SESSION['user']);
            }
        }
    }

    private function authenticate(): void {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userInDB = $this->userRepository->getUserByEmail($email);

        if ($userInDB->getPassword() === $password) {
            $_SESSION['user'] = $userInDB->getId();

            $this->redirectToBackend();
        }

        header("Location: /?page=login");
    }

    private function redirectToBackend(): void {
        header("Location: /?page=admin");
    }
}