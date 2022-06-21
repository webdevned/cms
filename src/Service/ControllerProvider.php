<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\AdminController;
use App\Controller\DetailController;
use App\Controller\HomeController;
use App\Controller\ListController;
use App\Controller\LoginController;
use App\Controller\LogoutController;

class ControllerProvider {

    private array $list = [
        'detail' => DetailController::class,
        'home' => HomeController::class,
        'list' => ListController::class,
        'login' => LoginController::class,
        'admin' => AdminController::class,
        'logout' => LogoutController::class
    ];

    /**
     * @param string $name
     *
     * @return string|null
     */
    public function getController(string $name): ?string {
        return $this->list[$name] ?? null;
    }

    public function getFrontEndList(): array {
    }

    public function getBackEndList():array {
    }

}