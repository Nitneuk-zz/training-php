<?php

declare(strict_types=1);

require_once 'DisplayInterface.php';

abstract class Product implements DisplayInterface
{
    protected $name;

    protected $description;

    protected $price;

    public function __construct(string $name = null, string $description = null, float $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    protected function getFormattedPrice(): float
    {
        return $this->price;
    }
}
