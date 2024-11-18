<?php

require_once __DIR__ . '/../models/category.php';

?>

<ul>
    <?php foreach ($categories as $category): ?>
        <?php $category = $category instanceof Category ? $category : Category::fromArray($category); ?>
        <li><a href="/products?category=<?= $category->id ?>"><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>