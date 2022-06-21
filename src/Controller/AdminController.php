<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\UserMapper;
use App\Repository\UserRepository;

class AdminController extends BaseController {
    private UserRepository $userRepository;
    private UserMapper $userMapper;

    public function __construct(UserRepository $userRepository, UserMapper $userMapper) {
        $this->userRepository = $userRepository;
        $this->userMapper = $userMapper;
    }

    public function index() {
        if (empty($_SESSION['user'])) {
            header("Location: /?page=login");
        }

        if (!empty($_GET['page']) && $_GET['page'] === 'admin' && !empty($_GET['create']) && $_GET['create'] === 'user') {
            $this->createUser();
        }

        if (
            !empty($_GET['page']) && $_GET['page'] === 'admin' && 
            !empty($_GET['delete']) && $_GET['delete'] === 'user' &&
            !empty($_GET['id'])
        ) {
            $this->deleteUser($_GET['id']);
        }

        $this->render('home_admin.html.twig', [
            'title' => 'Admin Home',
            'user' => $this->userRepository->getUser((int) $_SESSION['user']),
            'data' => $this->userRepository->getUserList()
        ]);
    }

    public function createUser() {
        if (!empty($_POST)) {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                $userDTO = $this->userMapper->map([
                    'id' => (string) (max(array_keys($this->userRepository->getUserList())) + 1),
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ]);

                $this->userRepository->createUser($userDTO);

                header("Location: /?page=admin");
            }
        } else {
            $this->render('user_create.html.twig', [
                'user' => $this->userRepository->getUser((int) $_SESSION['user']),
                'title' => 'Create new user'
            ]);
        }

        die();
    }

    private function deleteUser($id) {
        if (count($this->userRepository->getUserList()) > 1 && $id != $_SESSION['user']) {
            $this->userRepository->deleteUserById($id);
        }

        header("Location: /?page=admin");
    }
}