<?php

declare(strict_types=1);

namespace App\Models\Repository;

use App\Models\Category;
use App\Models\ModelInterface;

final class CategoryRepository extends AbstractRepository
{
    private const TABLE_NAME = 'Category';

    public function findForMenu()
    {
        $parentCategories = $this->findAll('parent_id IS NULL');

        /** @var Category $parentCategory */
        foreach ($parentCategories as $parentCategory) {
            $children = $this->findAll(\sprintf('parent_id = %d', $parentCategory->getId()));
            $parentCategory->setChildren($children);
        }

        return $parentCategories;
    }

    protected function map($category): ModelInterface
    {
        return (new Category())
            ->setId($category['id'])
            ->setName($category['name'])
            ->setDescription($category['description'])
        ;
    }

    protected function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}