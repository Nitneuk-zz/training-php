<?php

require_once 'Product.php';

$product = new Product();
$product->name = 'Guitare';
$product->description = 'Guitare folk';
$product->price = 124.10;

$html = <<<HTML
<p>
    Produit : $product->name<br/>
    Description : $product->description<br/>
    Prix : $product->price
</p>
HTML;

echo $html;