<?php

return [
    [
        'route' => '',
        'target' => [\Modules\Catalog\Controllers\CategoryController::class, 'index'],
        'name' => 'index'
    ],
    [
        'route' => '/product/{:slug}',
        'target' => [\Modules\Catalog\Controllers\ProductController::class, 'view'],
        'name' => 'product'
    ],
    [
        'route' => '/{:slug}',
        'target' => [\Modules\Catalog\Controllers\CategoryController::class, 'view'],
        'name' => 'category'
    ],
];