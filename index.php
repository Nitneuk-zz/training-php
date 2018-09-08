<?php

namespace App;

require __DIR__.'/vendor/autoload.php';

$loader = new \Twig_Loader_Filesystem('templates');
$twig = new \Twig_Environment($loader);

$product1 = new Instrument('Guitare', 'Guitare folk', 124.10, Instrument::TYPE_GUITARE);

$product2 = new Disc();
$product2
    ->setName('Electric Ladyland')
    ->setDescription('Apprends a jouer les meilleurds chansons d\'Hendrix')
    ->setPrice(15.99)
    ->setArtist('Jimi Hendrix')
;

$products = [$product1, $product2];

foreach ($products as $product) {
    echo $twig->render('product.html.twig', array('product' => $product));
}

