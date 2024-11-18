<?php

require_once __DIR__ . '/../connect.php';

class Category {
    public int $id;
    public string $name;
    public string $description;
    public string $img;

    static function FetchAll(int $limit, int $offset) {
        $result = pg_query_params(getConnection(), "SELECT * FROM categories ORDER BY name ASC, id DESC LIMIT $1 OFFSET $2", [$limit, $offset]);
        if (!$result) throw new Exception("Unexpected error fetching categories");
        foreach (pg_fetch_all($result) as $category) {
            yield Category::fromArray($category);
        }
    }

    static function FetchById(int $id) {
        $result = pg_query_params(getConnection(), "SELECT * FROM categories WHERE id = $1", [$id]);
        if (!$result) throw new Exception("Unexpected error fetching category");
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
