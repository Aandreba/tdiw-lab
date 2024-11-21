<link rel="stylesheet" href="/assets/product.css">

<div class="product">
    <h1 id="name"><?= $product->name ?></h1>
    <span id="price"></span>
    <p id="desc"><?= $product->description ?></p>
    <img id="img" src="<?= $product->img ?>">
    <!-- $product->category_id !-->
</div>

<script>
    const priceSpan = document.querySelector(".product #price");
    priceSpan.innerHTML = MONEY_FORMAT.format(<?= $product->price / 100 ?>);
</script>
