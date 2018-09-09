<?php

declare(strict_types=1);

namespace App;

use App\Controllers\CategoryController;
use App\Controllers\HomepageController;
use App\Controllers\NotFoundController;
use App\Controllers\ProductController;

class Router
{
    public function renderController(string $route): void
    {
        switch ($route) {
            case 1 === preg_match('/^\/$/', $route):
                $controller = new HomepageController();
                break;
            case 1 === preg_match('/^category\/\d+$/', $route);
                $controller = new CategoryController();
                break;
            case 1 === preg_match('/^product\/\d+$/', $route);
                $controller = new ProductController();
                break;
            default:
                $controller = new NotFoundController();
        }

        echo $controller();
    }
}