<?php
use TestTask\Controllers\Admin;
use TestTask\Controllers\Product;
use TestTask\Controllers\Main;

return [
    '~^admin/products$~' => [Admin::class, 'getAllProducts'],
    '~^admin/add-product$~' => [Admin::class, 'addProduct'],
    '~^product/(\d+)$~' => [Product::class, 'getOneProduct'],
    '~^$~' => [Main::class, 'index']
];