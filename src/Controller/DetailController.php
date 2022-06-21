<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;

class DetailController extends BaseController {
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    
    public function index() {
        $randomProduct = $this->productRepository->getList()[array_rand($this->productRepository->getList())];

        $id = (int) ($_GET['id'] ?? $randomProduct->getId());

        if ($this->productRepository->hasProduct($id)) {
            $product = $this->productRepository->getProduct($id);

            $this->render('detail.html.twig', [
                'title' => 'Detail',
                'item' => $product
            ]);
        } else {
            die(sprintf('Product (id: %s) not found', $id));
        }
    }
}