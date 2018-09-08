<?php

declare(strict_types=1);

namespace App;

final class Disc extends Product
{
    private $artist;

    public function setArtist(string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function format(): string
    {
        return <<<BOOK
        <p>
            Title : $this->name<br/>
            Author : $this->artist
        </p>
BOOK;
    }
}
