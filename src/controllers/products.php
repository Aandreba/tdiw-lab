<?php

require_once __DIR__ . '/../models/product.php';

$nameLike = isset($_GET['name']) ? $_GET['name'] : "";
$categoryId = isset($_GET['category']) ? intval($_GET['category']) : null;

$pagination = GetPagination();
$products = iterator_to_array(Product::FetchAll($nameLike, $categoryId, $pagination['limit'], $pagination['offset']));

header('Content-Type: application/json');
echo json_encode($products);
