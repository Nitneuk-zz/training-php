<?php

declare(strict_types=1);

namespace App\Models;

abstract class Product implements ModelInterface
{
    public const TYPE_GUITAR = 'guitar';
    public const TYPE_PIANO = 'piano';
    public const TYPE_DISC = 'disc';

    protected $name;

    protected $description;

    protected $price;

    private $type;

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

    public function setPrice(string $price): self
    {
        $this->price = (float) $price;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setType(string $type): self
    {
        if (!in_array($type, [self::TYPE_GUITAR, self::TYPE_PIANO, self::TYPE_DISC, true])) {
            throw new \Exception('Invalid type exception');
        }

        $this->type = $type;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
