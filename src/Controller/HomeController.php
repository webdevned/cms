<?php

declare(strict_types=1);

namespace App\Controller;

class HomeController extends BaseController {
    public function index() {
        $this->render('home.html.twig', [
            'title' => 'Home',
            'greeting' => 'Home sweet home'
        ]);
    }
}