<?php

namespace TestTask\Controllers;

use Core\Controller\BaseController;
use Core\Exceptions\InvalidRow;
use Core\Exceptions\NotFoundPage;
use Core\InputHandler\Validation;
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
                $validation = new Validation();
                $validation->getFormValidator()->setRules([
                        'name' => 'name',
                        'nameRow' => 'Имя',
                        'rules' => [
                            'required',
                            'max[10]',
                            'min[2]'
                        ]
                    ]);
            }

            $this->render->getHtmlPage('admin/add-product.php', [
//                'message' => $message,
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