<?php

namespace App\Repository;

class ProductRepository {

    private array $products;

    public function __construct() {
        $db = file_get_contents(dirname(__DIR__, 2) . '/database/data.json');

        $this->products = json_decode($db, true);
    }

    public function getList() {
        return $this->products;
    }

    public function getProduct(int $id) {
        return $this->products[$id - 1];
    }

    public function hasProduct(int $id) {
        return array_search($id, array_column($this->products, 'id'), true);

    }
}