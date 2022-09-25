<?php

namespace TestTask\Controllers;

use Core\Controller\BaseController;
use Core\Exceptions\NotFoundPage;
use TestTask\Models\Product;

class Main extends BaseController
{
    public function index()
    {
        $product = Product::getInstance();
        $allProducts = $product->getAll();

        if (!$allProducts) {
            throw new NotFoundPage();
        }

        $this->render->getHtmlPage('main/index.php', ['products' => $allProducts]);
    }
}