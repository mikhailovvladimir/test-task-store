<?php

namespace TestTask\Models;

use Core\Database\Db;
use Core\Exceptions\InvalidRow;

class Product extends Db
{
    public function add(Category $category)
    {
        if (empty($_POST['name'])) {
            throw new InvalidRow('Поле "название" не заполнено!');
        }

        if (empty($_POST['image'])) {
            throw new InvalidRow('Поле "Изображение" не заполнено!');
        }

        if (empty($_POST['description'])) {
            throw new InvalidRow('Поле "Описание" не заполнено!');
        }

        if (empty($_POST['price'])) {
            throw new InvalidRow('Поле "Цена" не заполнено!');
        }

        if (empty($_POST['category'])) {
            throw new InvalidRow('Поле "Категория" не заполнено!');
        }

        $validationConfig = array(
            'name' => array(
                'filter' => FILTER_SANITIZE_STRING,
                'options' => array('min_range' => 3, 'max_range' => 255)
            ),

            'image' => array(
                'filter' => FILTER_SANITIZE_STRING,
                'options' => array('min_range' => 3, 'max_range' => 500)
            ),

            'description' => array(
                'filter' => FILTER_SANITIZE_STRING,
                'options' => array('min_range' => 3, 'max_range' => 1000)
            ),

            'price' => array(
                'filter' => FILTER_SANITIZE_STRING,
                'options' => array('min_range' => 3, 'max_range' => 10)
            ),

            'category' => array(
                'filter' => FILTER_SANITIZE_STRING,
                'options' => array('min_range' => 3, 'max_range' => 100)
            )
        );

        $input = filter_input_array(INPUT_POST, $validationConfig);

        if (!in_array($input['category'], $category->getAllCategories())) {
            throw new InvalidRow('Некорректно заполенна форма');
        }

        if (!is_numeric($input['price'])) {
            throw new InvalidRow('Некорректно заполенна форма');
        }

        foreach ($input as $key => $value) {
            if ($value === false) {
                throw new InvalidRow('Некорректно заполенна форма');
            }
        }

        $this->insert($input);

        return 'Продукт добавлен';
    }

    public function getById(int $id)
    {
        return parent::getById($id);
    }

    protected function getFileName(): string
    {
        return 'products.txt';
    }
}