<?php

require_once __DIR__ . '/../../models/product.php';

$nameLike = $_GET['name'] ?? "";
$pagination = GetPagination();
$products = Product::FetchAll($nameLike, $pagination['limit'], $pagination['offset']);

header('Content-Type: application/json');
echo json_encode(iterator_to_array($products));
