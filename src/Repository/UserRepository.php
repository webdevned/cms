<?php

declare(strict_types=1);

namespace App\Repository;

use App\Connection;
use App\Container;
use App\DTO\UserMapper;
use App\DTO\UserDTO;

class UserRepository {
    private array $list = [];

    public function __construct() {
        $db = (new Container())->get(Connection::class)->getConnection();
        $usersFromDB = $db->query('SELECT * from user')
            ->fetchAll(\PDO::FETCH_ASSOC);

        $mapper = new UserMapper();
        foreach ($usersFromDB as $data) {
            $this->list[$data['id']] = $mapper->map($data);
        }
    }

    /**
     * @return UserDTO[]
     */
    public function getUserList(): array {
        return $this->list;
    }

    /**
     * @param int $id
     *
     * @return UserDTO|null
     */
    public function getUser(int $id): ?UserDTO {
        return $this->list[$id] ?? null;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function hasUser(int $id): bool {
        return array_key_exists($id, $this->list);
    }

    public function getUserByEmail(string $email) {
        foreach ($this->list as $user) {
            if ($user->getEmail() === $email) {
                $user = $this->list[$user->getId()];

                break;
            }
        }

        return $user ?? null;
    }
}