<link rel="stylesheet" href="/assets/categories.css">

<div class="categories">
    <?php foreach ($categories as $category): ?>
        <div class="category" onclick="onClickCategory(<?= $category->id ?>)">
            <img src="/<?= $category->img ?>">
            <span><?= $category->name ?></span>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function onClickCategory(categoryId) {
        const url = new URL('?at=products', window.location.href);
        url.searchParams.set('category', categoryId);
        window.location = url;
    }
</script>
