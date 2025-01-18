<link rel="stylesheet" href="assets/products.css?v=1.0">

<div class="products">
    <input type="text" id="search-input" placeholder="Search for a product">
    <div id="products-list">
        <span>Loading...</span>
    </div>
</div>

<?php require_once __DIR__ . '/product.php' ?>

<script type="module">
    import ProductSearchEngine from "./assets/products.js";

    const products = document.querySelector(".products");
    const productsList = document.querySelector(".products #products-list");
    const searchInput = document.querySelector(".products #search-input");
    const searchEngine = new ProductSearchEngine(searchInput.value, window.tdiw_category);
    const product_info = document.querySelector("div.product-info");
    product_info.style.display = "none";
    window.tdiw_product_id = null;

    products.addEventListener("tdiw-refresh", () => searchEngine.search(searchInput.value, window.tdiw_category));
    searchInput.addEventListener("change", () => searchEngine.search(searchInput.value, window.tdiw_category));
    searchEngine.addEventListener("searchresults", ({
        detail
    }) => {
        if ("startViewTransition" in document) {
            document.startViewTransition(() => renderProducts(detail));
        } else {
            renderProducts(detail);
        }
    });

    function renderProducts(detail) {
        productsList.replaceChildren(...detail.map(product => {
            const img = document.createElement("img");
            img.src = product.img;

            const name = document.createElement("span");
            name.textContent = product.name;

            const price = document.createElement("span");
            price.textContent = MONEY_FORMAT.format(product.price / 100);

            const div = document.createElement("div");
            div.classList.add("product");
            div.appendChild(img);
            div.appendChild(name);
            div.appendChild(price);

            div.addEventListener("click", () => {
                products.style.display = "none"
                product_info.style.removeProperty("display");
                window.tdiw_product_id = product.id;
                product_info.dispatchEvent(new Event("tdiw-refresh"));
            });

            return div;
        }));
    }
</script>
