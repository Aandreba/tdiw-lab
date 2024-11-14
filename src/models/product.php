<?php

require_once __DIR__ . '/../connect.php';

class Product {
    public int $id;
    public string $name;
    public string $description;
    public string $img;
    public int $price;
    public int $category_id;

    static function byCategory(string $categoryName) {
        $conn = getDatabaseConnection();
        if (!$conn) throw new Exception("Failed to connect to database");

        $result = pg_query_params(
            $conn,
            "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name = $1)",
            [$categoryName]
        );

        foreach (pg_fetch_all($result) as $product) {
            yield Product::fromArray($product);
        }
    }

    private static function fromArray(array $product): Product {
        return new Product($product['id'], $product['name'], $product['description'], $product['img'], $product['price'], $product['category_id']);
    }
}
