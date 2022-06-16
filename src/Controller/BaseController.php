<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController {

    public function render(string $template, array $data) {
        $loader = new FilesystemLoader(dirname(__DIR__, 1) . '/templates');

        $twig = new Environment($loader);

        echo $twig->render($template, $data);
    }
}