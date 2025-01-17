<?php

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../cart.php';

function CreateOrder(int $userId) {
    $conn = getConnection();
    $cart = getCart();

    if (count($cart) == 0) return throw new Exception("Cannot create order from empty cart");
    $orderId = pg_fetch_array(pg_query_params($conn, "INSERT INTO orders (user_id) VALUES ($1) RETURNING id", [$userId]), 0, PGSQL_NUM)[0];
    if (!is_int($orderId)) $orderId = intval($orderId);

    foreach ($cart as $item => $count) {
        if (!pg_query_params($conn, "INSERT INTO order_products (order_id, product_id, price, quantity) VALUES ($1, $2, (SELECT price FROM products where id = $2), $3)", [$orderId, $item, $count])) {
            throw new Exception("Error inserting order into the database");
        }
    }

    clearCart();
}
