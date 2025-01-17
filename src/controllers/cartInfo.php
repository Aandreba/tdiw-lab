<?php

require_once __DIR__ . '/../cart.php';
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../models/order.php';

if (isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "set":
            setCartProductCount(intval($_POST["id"]), intval($_POST["count"]));
            break;
        case "clear":
            clearCart();
            break;
        case "submit":
            if (!isset($_SESSION["user"])) exit;
            CreateOrder(intval($_SESSION["user"]));
            break;
        default:
            break;
    }
}

$cart_items = [];
$i = 0;
foreach (getCart() as $item => $count) {
    $j = $i;
    $i++;
    $prod = Product::Fetch($item);
    if ($prod == null) continue;
    $cart_items += [$j => [$prod, $count]];
}

include __DIR__ . '/../views/cartInfo.php';
