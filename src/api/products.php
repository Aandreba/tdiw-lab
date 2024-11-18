<?php

require_once __DIR__ . '/../models/product.php';

$nameLike = isset($_GET['name']) ? $_GET['name'] : "";
$pagination = GetPagination();
$products = iterator_to_array(Product::FetchAll($nameLike, $pagination['limit'], $pagination['offset']));

header('Content-Type: application/json');
echo json_encode($products);
