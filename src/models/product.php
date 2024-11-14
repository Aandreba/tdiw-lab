<?php

require_once __DIR__ . '/../connect.php';

function getProductsByCategory(string $category) {
    $conn = getDatabaseConnection();
    if (!$conn) return null;

    $result = pg_query($conn, "SELECT * FROM products");
    return pg_fetch_all($result);
}
