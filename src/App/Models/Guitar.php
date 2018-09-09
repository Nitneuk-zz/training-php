<?php

declare(strict_types=1);

namespace App\Models;

final class Guitar extends Product
{
    private $numberOfStrings;

    private $color;

    public function setNumberOfStrings(string $numberOfStrings): self
    {
        $this->numberOfStrings = (int) $numberOfStrings;

        return $this;
    }

    public function getNumberOfStrings(): ?int
    {
        return $this->numberOfStrings;
    }


    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }
}