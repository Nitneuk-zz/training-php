<?php

declare(strict_types=1);

namespace App\Models;

final class Category implements ModelInterface
{
    private $id;

    private $name;

    private $description;

    private $parent;

    private $children;

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function setParent($parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParent(): ?Category
    {
        return $this->parent;
    }

    public function setChildren($children): self
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return Category[]|null
     */
    public function getChildren(): ?array
    {
        return $this->children;
    }
}