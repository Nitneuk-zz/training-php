<?php

namespace App;

use App\Models\Repository\CategoryRepository;
use App\Models\Repository\ProductRepository;

require __DIR__.'/vendor/autoload.php';

$loader = new \Twig_Loader_Filesystem('templates');
$twig = new \Twig_Environment($loader);

$dataProvider = new DataProvider(
    'mysql',
        'root',
    'root',
    'music_shop'
);

$dataProvider->connect();

$categoryRepository = new CategoryRepository($dataProvider);
$categories = $categoryRepository->findForMenu();

echo $twig->render('menu.html.twig', ['categories' => $categories]);

$category = $categories[1]->getChildren()[0];
$productRepository = new ProductRepository($dataProvider);
$products = $productRepository->findForCategory($category);

echo $twig->render('category.html.twig', [
    'category' => $category,
    'products' => $products,
]);
