<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\DetailController;
use App\Controller\HomeController;
use App\Controller\ListController;

class ControllerProvider {
    public function getList(): array{
        return [
            DetailController::class,
            HomeController::class,
            ListController::class,
        ];
    }

}