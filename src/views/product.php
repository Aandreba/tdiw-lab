<link rel="stylesheet" href="/assets/product.css">

<div class="product">
    <img id="img" src="<?= $product->img ?>">
    <div class="info">
        <h1 id="name"><?= $product->name ?></h1>
        <span id="price"></span>
        <p id="desc"><?= $product->description ?></p>
    </div>
    <!-- $product->category_id !-->
</div>

<script>
    const priceSpan = document.querySelector(".product #price");
    priceSpan.innerHTML = MONEY_FORMAT.format(<?= $product->price / 100 ?>);
</script>
