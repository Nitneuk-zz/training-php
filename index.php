<?php

namespace App;

use App\Models\Repository\CategoryRepository;
use App\Models\Repository\ProductRepository;

require __DIR__.'/vendor/autoload.php';
//
//
//$category = $categories[1]->getChildren()[0];
//$productRepository = new ProductRepository($dataProvider);
//$products = $productRepository->findForCategory($category);
//
//echo $twig->render('category.html.twig', [
//    'category' => $category,
//    'products' => $products,
//]);

$router = new Router();
$router->renderController($_SERVER['REQUEST_URI']);
