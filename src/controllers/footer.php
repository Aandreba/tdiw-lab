<?php

session_start();
require_once __DIR__ . '/../cart.php';
require_once __DIR__ . '/../models/product.php';

$total_price = 0;
$item_count = 0;
foreach (getCart() as $pk => $count) {
    $prod = Product::Fetch($pk);
    if ($prod == null) continue;
    $total_price += $count * $prod->price;
    $item_count += $count;
}

header('Content-Type: application/json');
echo json_encode(["price" => $total_price, "count" => $item_count]);
