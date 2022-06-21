<?php

declare(strict_types=1);

namespace App\DTO;

use App\DTO\UserDTO;

class UserMapper {
    public function map(array $data): UserDTO {
        return new UserDTO($data);
    }
}