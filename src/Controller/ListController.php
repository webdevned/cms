<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;

class ListController extends BaseController {
    
    public function __construct() {
        parent::__construct();

        $repo = new ProductRepository();

        $this->render('list.html.twig', [
            'title' => 'List',
            'list' => $repo->getList()
        ]);
    }
}