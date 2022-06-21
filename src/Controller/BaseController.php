<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\ViewInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController implements ViewInterface {
    public function render(string $template, array $data): void {
        $loader = new FilesystemLoader(dirname(__DIR__, 1) . '/templates');
        $twig = new Environment($loader);

        echo $twig->render($template, $data);
    }
}