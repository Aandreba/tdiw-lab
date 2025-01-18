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

function GetOrdersList(int $userId, int $offset, int $limit) {
    $conn = getConnection();
    $result = pg_query_params($conn, "SELECT id, creation_date FROM orders WHERE orders.user_id = $1 ORDER BY creation_date DESC OFFSET $2 LIMIT $3", [$userId, $offset, $limit]);

    $orders = [];
    foreach (pg_fetch_all($result) as $order) {
        $items = pg_fetch_all(pg_query_params($conn, "SELECT products.name AS name, products.description AS description, order_products.quantity AS quantity, order_products.price AS price FROM order_products INNER JOIN products ON products.id = order_products.product_id WHERE order_products.order_id = $1::int", [intval($order["id"])]));
        var_dump($items);

        $total = 0;
        foreach ($items as $item) {
            $total += intval($item["quantity"]) * intval($item["price"]);
        }

        array_push($orders, ["items" => $items, "total" => $total, "creation_date" => $order["creation_date"]]);
    }

    return $orders;
}
