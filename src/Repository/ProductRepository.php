<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\ProductMapper;

class ProductRepository {

    private array $list;

    public function __construct() {
        $url = dirname(__DIR__, 2) . '/database/data.json';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        $productMapper = new ProductMapper();
        foreach ($array as $product) {
            $this->list[$product['id']] = $productMapper->map($product);
        }
    }

    public function getList() {
        return $this->list;
    }

    public function getProduct(int $id) {
        return $this->list[$id] ?? null;
    }

    public function hasProduct(int $id) {
        return array_key_exists($id, $this->list);

    }
}