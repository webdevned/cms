<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;

class DetailController extends BaseController {

    public function __construct() {
        parent::__construct();

        $repo = new ProductRepository();

        $product = $repo->getProduct(random_int(0, count($repo->getList())));

        $this->render('detail.html.twig', [
            'title' => 'Detail',
            'item' => $product
        ]);
    }
}