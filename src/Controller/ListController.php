<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;

class ListController extends BaseController {
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $this->render('list.html.twig', [
            'title' => 'List',
            'list' => $this->productRepository->getList()
        ]);
    }
}