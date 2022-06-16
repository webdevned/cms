<?php

declare(strict_types=1);

namespace App\Controller;

class HomeController extends BaseController {
    public function __construct() {
        parent::__construct();

        $this->render('home.html.twig', [
            'title' => 'Home',
            'greeting' => 'Home sweet home'
        ]);
    }
}