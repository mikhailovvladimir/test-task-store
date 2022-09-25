<?php

return [
    '~^admin/products$~' => [\TestTask\Controllers\Admin::class, 'getAllProducts'],
    '~^admin/add-product$~' => [\TestTask\Controllers\Admin::class, 'addProduct'],
    '~^product/(\d+)$~' => [\TestTask\Controllers\Product::class, 'getOneProduct'],
    '~^$~' => [\TestTask\Controllers\Main::class, 'index'],
];