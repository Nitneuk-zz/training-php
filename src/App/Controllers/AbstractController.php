<?php

declare(strict_types=1);

namespace App\Controllers;

use App\DataProvider;

abstract class AbstractController implements ControllerInterface
{
    protected $twig;
    protected $dataProvider;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $this->twig = new \Twig_Environment($loader);

        $this->dataProvider = new DataProvider(
            'mysql',
            'root',
            'root',
            'music_shop'
        );

        $this->dataProvider->connect();
    }

    public function __destruct()
    {
        $this->dataProvider->disconnect();
    }
}