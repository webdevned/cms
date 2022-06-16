<?php

declare(strict_types=1);

namespace App\Service;

use App\Controller\DetailController;
use App\Controller\HomeController;
use App\Controller\ListController;

class ControllerProvider {

    private array $list = [
        'detail' => DetailController::class,
        'home' => HomeController::class,
        'list' => ListController::class,
    ];

    /**
     * @param string $name
     *
     * @return string|null
     */
    public function getController(string $name): ?string {
        return $this->list[$name] ?? null;
    }



}