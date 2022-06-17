<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;

class DetailController extends BaseController {

    public function __construct() {
        parent::__construct();

        $repo = new ProductRepository();
        $randomProduct = $repo->getList()[array_rand($repo->getList())];

        $id = (int) ($_GET['id'] ?? $randomProduct->getId());

        if ($repo->hasProduct($id)) {
            $product = $repo->getProduct($id);

            $this->render('detail.html.twig', [
                'title' => 'Detail',
                'item' => $product
            ]);
        } else {
            die(sprintf('Product (id: %s) not found', $id));
        }
    }
}