<?php

namespace TestTask\Controllers;

use Core\Controller\BaseController;
use Core\Exceptions\InvalidRow;
use Core\Exceptions\NotFoundPage;
use TestTask\Models\Category;
use TestTask\Models\Product;

class Admin extends BaseController
{
    public function addProduct()
    {
        try {
            $product = Product::getInstance();
            $category = new Category();
            $categories = $category->getAllCategories();
            if (!empty($_POST)) {
                $message = $product->add($category);
            }
            $this->render->getHtmlPage('admin/add-product.php', [
                'message' => $message,
                'categories' => $categories
            ]);
        } catch (InvalidRow $exception) {
            $this->render->getHtmlPage('admin/add-product.php', [
                'error' => $exception->getMessage(),
                'categories' => $categories
            ]);
        }
    }

    public function getAllProducts()
    {
        $product = Product::getInstance();
        $allProducts = $product->getAll();

        if (!$allProducts) {
            throw new NotFoundPage();
        }

        $this->render->getHtmlPage('admin/get-all-products.php', ['products' => $allProducts]);
    }
}