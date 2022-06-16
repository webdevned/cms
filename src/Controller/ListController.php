<?php

declare(strict_types=1);

namespace App\Controller;

class ListController extends BaseController {
    public function __construct() {
        parent::__construct();

        $this->render('list.html.twig', [
            'title' => 'List',
            'list' => ['Viens', 'Du', 'Trys']
        ]);
    }
}