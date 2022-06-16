<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\ViewInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController implements ViewInterface {

    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader(dirname(__DIR__, 1) . '/templates');
        $this->twig = new Environment($this->loader);
    }

    public function render(string $template, array $data): void {
        echo $this->twig->render($template, $data);
    }
}