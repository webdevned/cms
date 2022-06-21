<?php

declare(strict_types=1);

namespace App\DTO;

use App\DTO\ProductDTO;

class ProductMapper {
    public function map(array $data): ProductDTO {
        return new ProductDTO($data);
    }
}