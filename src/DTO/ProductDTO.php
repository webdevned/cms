<?php

declare(strict_types=1);

namespace App\DTO;

class ProductDTO {
    private string $id;
    private string $name;
    private string $description;

    public function __construct(array $data) {
        if (!empty($data['id']) && !empty($data['name']) && !empty($data['description'])) {
            $this->setId($data['id']);
            $this->setName($data['name']);
            $this->setDescription($data['description']);
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}