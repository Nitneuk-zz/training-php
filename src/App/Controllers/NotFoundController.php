<?php

declare(strict_types=1);

namespace App\Controllers;

class NotFoundController
{
    public function __invoke(): string
    {
        return 'Not found';
    }
}
