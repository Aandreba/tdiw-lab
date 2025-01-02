<?php

require_once __DIR__ . '/../models/product.php';

$id = $_GET['id'];
$product = Product::Fetch($id);
if (!$product) {
    http_response_code(404);
    echo 'Product not found';
    exit;
}

header('Content-Type: application/json');
echo json_encode($product);
