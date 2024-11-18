<link rel="stylesheet" href="/assets/products.css">

<div class="products">
    <input type="text" id="search-input" placeholder="Search for a product">
    <div id="products-list">
        <span>Loading...</span>
    </div>
</div>

<script type="module">
    import ProductSearchEngine from "/assets/products.js";

    const productsList = document.querySelector(".products #products-list");
    const searchInput = document.querySelector(".products #search-input");
    const searchEngine = new ProductSearchEngine(searchInput.value);

    searchInput.addEventListener("change", () => searchEngine.search(searchInput.value, <?= $category ?? "null" ?>));
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
                const url = new URL('?at=product', window.location.href);
                url.searchParams.set('id', product.id);
                window.location = url;
            });

            return div;
        }));
    }
</script>
