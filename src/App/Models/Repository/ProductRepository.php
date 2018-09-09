<?php

declare(strict_types=1);

namespace App\Models\Repository;

use App\Models\Category;
use App\Models\Disc;
use App\Models\Guitar;
use App\Models\ModelInterface;
use App\Models\Piano;
use App\Models\Product;

final class ProductRepository extends AbstractRepository
{
    private const TABLE_NAME = 'Product';

    public function findForCategory(Category $category)
    {
        $sql = <<<SQL
SELECT p.* FROM Product AS p
INNER JOIN CategoryProduct AS cp ON p.id = cp.product_id
WHERE cp.category_id = %d
SQL;
        $sql = \sprintf($sql, $category->getId());

        if (null !== $category->getChildren()) {
            $childrenIds = \array_map(function (Category $category) {
                return $category->getId();
            }, $category->getChildren());

            $sql = \sprintf('%s OR cp.category_id IN (%s)', $sql, \implode(', ', $childrenIds));
        }

        $stmt = $this->dataProvider->executeQuery($sql);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $products = [];
        foreach ($results as $result) {
            $products[] = $this->map($result);
        }

        return $products;
    }

    protected function map($product): ModelInterface
    {
        $object = null;

        switch ($product['type']) {
            case Product::TYPE_GUITAR:
                $object = (new Guitar())
                    ->setNumberOfStrings($product['numberOfStrings'])
                    ->setColor($product['color'])
                ;
                break;
            case Product::TYPE_PIANO;
                $object = (new Piano())
                    ->setNumberOfKeys($product['numberOfKeys'])
                ;
                break;
            default;
                $object = new Disc();
        }

        $object
            ->setName($product['name'])
            ->setDescription($product['description'])
            ->setPrice($product['price'])
        ;

        return $object;
    }

    protected function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}