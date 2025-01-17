<?php

require_once __DIR__ . '/../cart.php';
require_once __DIR__ . '/../models/product.php';

$items = [];
foreach (getCart() as $item => $count) {
    $prod = Product::Fetch($item);
    if ($prod == null) continue;
    array_push($items, $prod);
}

include __DIR__ . '/../views/cartInfo.php';
