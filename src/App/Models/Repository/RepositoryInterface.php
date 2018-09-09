<?php

declare(strict_types=1);

namespace App\Models\Repository;

interface RepositoryInterface
{
    public function findAll();

    public function find(int $id);
}
