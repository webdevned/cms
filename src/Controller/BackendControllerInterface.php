<?php

declare(strict_types=1);

namespace App\Controller;

interface BackendControllerInterface {
    public function __construct();

    public function init(): void;

//    private function authenticate(): void;
//
//    private function redirectToBackend(): void;
}