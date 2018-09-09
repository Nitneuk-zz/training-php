<?php

declare(strict_types=1);

namespace App\Models;

final class Piano extends Product
{
    private $numberOfKeys;

    public function setNumberOfKeys(int $numberOfKeys): self
    {
        $this->numberOfKeys = $numberOfKeys;

        return $this;
    }

    public function getNumberOfKeys(): ?int
    {
        return $this->numberOfKeys;
    }
}