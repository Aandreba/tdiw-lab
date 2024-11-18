<?php
$uuid = "aa";
?>

<div id="<?php echo $uuid; ?>">
    <input type="text" id="search-input" placeholder="Search for a product">
    <ul id="products-list">
        <li>Loading...</li>
    </ul>
</div>

<script type="module">
    import ProductSearchEngine from "./assets/products.js";

    const productsList = document.querySelector("#<?php echo $uuid; ?> #products-list");
    const searchInput = document.querySelector("#<?php echo $uuid; ?> #search-input");
    const searchEngine = new ProductSearchEngine(searchInput.value);

    searchInput.addEventListener("change", () => searchEngine.search(searchInput.value));
    searchEngine.addEventListener("searchresults", ({
        detail
    }) => {
        productsList.replaceChildren(...detail.map(product => {
            const li = document.createElement("li");
            li.textContent = product.name;
            return li;
        }));
    });
</script>
