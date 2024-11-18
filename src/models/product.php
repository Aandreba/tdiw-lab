<?php

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../pagination.php';

class Product {
    public int $id;
    public string $name;
    public string $description;
    public string $img;
    public int $price;
    public int $category_id;

    static function FetchAll(string $nameLike = "", int $limit, int $offset) {
        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM products WHERE name LIKE concat('%', $1, '%') LIMIT $2 OFFSET $3",
            [$nameLike, $limit, $offset]
        );

        if (!$result) throw new Exception("Unexpected error fetching products");
        foreach (pg_fetch_all($result) as $product) {
            yield Product::fromArray($product);
        }
    }

    static function FetchByCategory(string $categoryName, int $limit, int $offset) {
        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name = $1) LIMIT $2 OFFSET $3",
            [$categoryName, $limit, $offset]
        );

        if (!$result) throw new Exception("Unexpected error fetching products");
        foreach (pg_fetch_all($result) as $product) {
            yield Product::fromArray($product);
        }
    }

    private static function fromArray(array $product): Product {
        return new Product($product['id'], $product['name'], $product['description'], $product['img'], $product['price'], $product['category_id']);
    }
}
