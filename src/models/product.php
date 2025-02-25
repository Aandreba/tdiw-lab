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

    static function FetchAll(string $nameLike, ?int $categoryId, int $limit, int $offset) {
        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM products WHERE ($2::int IS NULL OR category_id = $2::int) AND LOWER(name) LIKE concat('%', LOWER($1::text), '%') ORDER BY name ASC, id DESC LIMIT $3 OFFSET $4",
            [$nameLike, $categoryId, $limit, $offset]
        );

        if (!$result) throw new Exception("Unexpected error fetching products");
        foreach (pg_fetch_all($result) as $product) {
            yield Product::fromArray($product);
        }
    }

    static function Fetch(int $id): ?Product {
        $result = pg_query_params(getConnection(), "SELECT * FROM products WHERE id = $1", [$id]);
        if (!$result) throw new Exception("Unexpected error fetching product");
        $row = pg_fetch_assoc($result);
        if (!$row) return null;
        return Product::fromArray($row);
    }

    private static function fromArray(array $product): Product {
        $p = new Product();
        $p->id = $product['id'];
        $p->name = $product['name'];
        $p->description = $product['description'];
        $p->img = $product['img'];
        $p->price = $product['price'];
        $p->category_id = $product['category_id'];
        return $p;
    }
}
