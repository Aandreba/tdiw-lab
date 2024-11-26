<?php

require_once __DIR__ . '/../connect.php';

class Category {
    public int $id;
    public string $name;
    public string $description;
    public string $img;

    static function FetchAll(int $limit, int $offset) {
        $conn = getConnection();
        $result = pg_query_params($conn, "SELECT * FROM categories ORDER BY name ASC, id DESC LIMIT $1 OFFSET $2", [$limit, $offset]);
        var_dump($result);
        if (!$result) yield new Exception("Unexpected error fetching categories: " . pg_last_error($conn));
        else foreach (pg_fetch_all($result) as $category) {
            var_dump($category);
            yield Category::fromArray($category);
        }
    }

    static function Fetch(int $id): ?Category {
        $conn = getConnection();
        $result = pg_query_params($conn, "SELECT * FROM categories WHERE id = $1", [$id]);
        if (!$result) throw new Exception("Unexpected error fetching category: " . pg_last_error($conn));
        $row = pg_fetch_assoc($result);
        if (!$row) return null;
        return Category::fromArray($row);
    }

    private static function fromArray(array $category): Category {
        $c = new Category();
        $c->id = $category['id'];
        $c->name = $category['name'];
        $c->description = $category['description'];
        $c->img = $category['img'];
        return $c;
    }
}
