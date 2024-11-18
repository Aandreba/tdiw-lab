<link rel="stylesheet" href="/assets/categories.css">

<div class="categories">
    <?php foreach ($categories as $category): ?>
        <div class="category">
            <img src="/<?= $category->img ?>">
            <span><?= $category->name ?></span>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function onClickCategory(categoryId) {
        window.location.href = `/?at=products&category=${categoryId}`;
    }
</script>
