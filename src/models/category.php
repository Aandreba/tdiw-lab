<?php

require_once __DIR__ . '/../connect.php';

class Category {
    public int $id;
    public string $name;
    public string $description;
    public string $img;

    static function FetchAll(int $page = 1, int $pageSize = 10) {
        $page = max(1, $page);
        $pageSize = max(1, $pageSize);
        $offset = ($page - 1) * $pageSize;
        $result = pg_query_params(getConnection(), "SELECT * FROM categories LIMIT $1 OFFSET $2", [$pageSize, $offset]);
        foreach (pg_fetch_all($result) as $category) {
            yield Category::fromArray($category);
        }
    }

    static function FetchById(int $id) {
        $sql = "SELECT * FROM categories WHERE id = $1";
        $result = pg_query_params(getConnection(), $sql, [$id]);
        $row = pg_fetch_assoc($result);
        if (!$row) return null;
        return Category::fromArray($row);
    }

    static function fromArray(array $category) {
        $c = new Category();
        $c->id = $category['id'];
        $c->name = $category['name'];
        $c->description = $category['description'];
        $c->img = $category['img'];
        return $c;
    }
}
