<?php

declare(strict_types=1);

namespace App\DTO;

class UserDTO {
    private string $id;
    private string $username;
    private string $email;
    private string $password;

    public function __construct(array $data) {
        if (!empty($data['id']) && !empty($data['username']) && !empty($data['email']) && !empty($data['password'])) {
            $this->setId($data['id']);
            $this->setUsername($data['username']);
            $this->setEmail($data['email']);
            $this->setPassword($data['password']);
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}