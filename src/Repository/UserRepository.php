<?php

declare(strict_types=1);

namespace App\Repository;

use App\Connection;
use App\DTO\UserMapper;
use App\DTO\UserDTO;
use PDO;

class UserRepository {
    private array $list = [];
    private PDO $db;
    private UserMapper $mapper;

    public function createUser(UserDTO $userDTO) {
        $id = $userDTO->getId();
        $username = $userDTO->getUsername();
        $email = $userDTO->getEmail();
        $password = $userDTO->getPassword();

        $sql = $this->db->prepare("INSERT INTO user (`id`, `username`, `email`, `password`) VALUES (:id, :username, :email, :password)");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':username', $username, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->execute();
    }

    public function deleteUserById($id) {
        $id = (int) $id;
        $sql = $this->db->prepare("DELETE FROM user WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
    }

    public function __construct(Connection $connection, UserMapper $mapper) {
        $this->db = $connection->getConnection();
        $this->mapper = $mapper;

        $usersFromDB = $this->db->query('SELECT * from user')
            ->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usersFromDB as $data) {
            $this->list[$data['id']] = $this->mapper->map($data);
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