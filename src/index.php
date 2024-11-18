<?php


switch ($_GET['at']) {
    case "categories":
        require __DIR__ . '/controllers/api/categories.php';
        break;
    case "products":
        require __DIR__ . '/controllers/api/products.php';
        break;
    default:
        http_response_code(404);
        echo "Not found";
        break;
}
