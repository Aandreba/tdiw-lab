<?php

require_once __DIR__ . '/../connect.php';

class Product {
    public int $id;
    public string $name;
    public string $description;
    public string $img;
    public int $price;
    public int $category_id;

    static function FetchByCategory(string $categoryName, int $page = 1, int $pageSize = 10) {
        $page = max(1, $page);
        $pageSize = max(1, $pageSize);
        $offset = ($page - 1) * $pageSize;

        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name = $1) LIMIT $2 OFFSET $3",
            [$categoryName, $pageSize, $offset]
        );

        foreach (pg_fetch_all($result) as $product) {
            yield Product::fromArray($product);
        }
    }

    private static function fromArray(array $product): Product {
        return new Product($product['id'], $product['name'], $product['description'], $product['img'], $product['price'], $product['category_id']);
    }
}
