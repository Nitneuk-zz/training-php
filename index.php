<?php

require_once 'Instrument.php';
require_once 'Disc.php';

$product1 = new Instrument('Guitare', 'Guitare folk', 124.10, Instrument::TYPE_GUITARE);

$product2 = new Disc();
$product2
    ->setName('Electric Ladyland')
    ->setDescription('Apprends a jouer les meilleurs chanson d\'Hendrix')
    ->setPrice(15.99)
    ->setArtist('Jimi Hendrix')
;

$products = [$product1, $product2];

foreach ($products as $product) {

    if ($product instanceof Instrument) {
        echo '<strong>Instrument :</strong>';
    } else if ($product instanceof Disc) {
        echo '<strong>Disc : </strong>';
    }

    echo $product->format();

    echo $product->getPrice().' €';

    echo '<hr/>';
}

