<?php

declare(strict_types=1);

namespace App\Controll;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DetailControll {
    public function __construct() {
        $loader = new FilesystemLoader(dirname(__DIR__, 1) . '/templates');
        $twig = new Environment($loader);

        echo $twig->render('base.html.twig', [
            'title' => 'Controller',
            'controller' => 'DetailControll'
        ]);
    }
}