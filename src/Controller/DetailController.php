<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\BaseController;

class DetailController extends BaseController {

    public function __construct() {
        $this->render('base.html.twig', [
            'title' => 'Controller',
            'controller' => 'DetailControll'
        ]);
    }
}