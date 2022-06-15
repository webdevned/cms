<?php

declare(strict_types=1);

namespace App\Controll;

use App\Controll\BaseController;

class DetailControll extends BaseController {

    public function __construct() {
        $this->render('base.html.twig', [
            'title' => 'Controller',
            'controller' => 'DetailControll'
        ]);
    }
}