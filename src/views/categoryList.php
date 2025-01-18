<link rel="stylesheet" href="assets/categories.css?v=1.0">

<div class="categories">
    <?php foreach ($categories as $category): ?>
        <?php if ($category instanceof Exception) throw $category; ?>
        <div class="category" onclick="onClickCategory(<?= $category->id ?>)">
            <img src="<?= $category->img ?>" style="width:100%;">
            <span><?= htmlentities($category->name, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></span>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/productsList.php' ?>

<script>
    const category_list = document.querySelector("div.categories");
    const product_list = document.querySelector("div.products");
    product_list.style.display = "none";
    window.tdiw_category = null;

    function onClickCategory(categoryId) {
        window.tdiw_category = categoryId;
        category_list.style.display = "none";
        product_list.style.removeProperty("display");
        product_list.dispatchEvent(new Event("tdiw-refresh"));
    }
</script>
