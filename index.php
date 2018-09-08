<?php

require_once 'Product.php';

$product1 = new Product('Guitare', 'Guitare folk', 124.10);
$product2 = new Product();
$product2
    ->setName('Guitare 2')
    ->setDescription('Guitare electrique')
    ->setPrice(199.99)
;

$products = [$product1, $product2];

foreach ($products as $product) {
    $name = $product->getName();
    $description = $product->getDescription();
    $price = $product->getPrice();

    echo <<<HTML
<p>
    Produit : $name<br/>
    Description : $description<br/>
    Prix : $price €
</p>
HTML;
}

