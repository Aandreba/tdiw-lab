<?php
function getCategories(): array
{
    $conn = getConn();
    $sql = ("SELECT * FROM categories");
    $stmt = pg_query($conn, $sql);
    $filas = pg_fetch_all($stmt);
    var_dump($filas);
    return $filas;
}

function getCategoryById(int $categoryId): array
{
    $conn = getConn();

    $sql = 'SELECT id, "name"
            FROM category
            WHERE id = $1';
    $params = [$categoryId];
    $result = pg_query_params($conn, $sql, $params);
    $categories = pg_fetch_all($result);
    return $categories;
}

