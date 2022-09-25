<?php

namespace TestTask\Controllers;

use Core\Controller\BaseController;
use Core\Exceptions\NotFoundPage;

class Product extends BaseController
{
    public function getOneProduct(int $id)
    {
        $productModel = \TestTask\Models\Product::getInstance();
        $oneProduct = $productModel->getById($id);
        if (!$oneProduct) {
            throw new NotFoundPage();
        }

        $this->render->getHtmlPage('product/get-one-product.php', ['product' => $oneProduct]);
    }
}