<?php

declare(strict_types=1);

namespace App\Models\Repository;

use App\DataProvider;
use App\Models\ModelInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $dataProvider;

    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function find(int $id)
    {
        $result = $this->dataProvider->executeQuery(\sprintf('SELECT  * FROM %s WHERE id = %d', $this->getTableName(), $id));
        $result = $result->fetch(\PDO::FETCH_ASSOC);

        return $this->map($result);
    }

    public function findAll(string $where = null)
    {
        $elements = [];

        $sql = \sprintf('SELECT  * FROM %s', $this->getTableName());

        if (null !== $where) {
            $sql = \sprintf('%s WHERE %s', $sql, $where);
        }

        $results = $this->dataProvider->executeQuery($sql);

        foreach ($results as $result) {
            $elements[] = $this->map($result);
        }

        return $elements;
    }

    abstract protected function map($element): ModelInterface;
    abstract protected function getTableName(): string;
}
