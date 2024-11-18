<?php


switch (isset($_GET['at']) ? $_GET['at'] : null) {
    case "categories":
        require __DIR__ . '/controllers/categories.php';
        break;
    case "products":
        require __DIR__ . '/controllers/products.php';
        break;
    default:
        http_response_code(404);
        echo "Not found";
        break;
}
