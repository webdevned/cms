<?php

declare(strict_types=1);

namespace App\Controller;

class DetailController extends BaseController {

    public function __construct() {
        parent::__construct();

        $this->render('detail.html.twig', [
            'title' => 'Detail',
            'controller' => 'DetailController'
        ]);
    }
}