<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Repository\CategoryRepository;

class HomepageController extends AbstractController
{
    public function __invoke(): string
    {
        $categoryRepository = new CategoryRepository($this->dataProvider);
        $categories = $categoryRepository->findForMenu();

        return $this->twig->render('base.html.twig', ['categories' => $categories]);
    }
}
