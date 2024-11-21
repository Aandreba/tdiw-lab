<?php

require __DIR__ . '/../models/product.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit;
}

$id = intval($_GET['id']);
$product = Product::Fetch($id);

if (!$product) {
    http_response_code(404);
    exit;
}

require __DIR__ . '/../views/product.php';
