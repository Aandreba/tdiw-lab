<input type="text" id="search-input" placeholder="Search for a product">
<ul id="products-list">
    <li>Loading...</li>
</ul>

<script>
    const productsList = document.getElementById("products-list");
    const searchInput = document.getElementById("search-input");

    const searchEngine = new ProductSearchEngine(searchInput.value);
    searchInput.addEventListener("change", () => searchEngine.search(searchInput.value));
    productsList.addEventListener("searchresults", ({
        detail
    }) => {
        productsList.children.forEach(child => child.remove());
        for (const product of detail) {
            const li = document.createElement("li");
            li.textContent = product.name;
            productsList.appendChild(li);
        }
    });

    /**
     * @typedef {Object} Product
     * @property {number} id
     * @property {string} name
     * @property {string} description
     * @property {string} img
     * @property {number} price
     * @property {number} category_id
     */

    class ProductSearchEngine extends EventTarget {
        /**
         * @type {AbortController}
         */
        #abort;
        /**
         * @type {number}
         */
        timeout;

        /**
         * @param {string} name - The name of the product.
         * @param {number} timeout - The default timeout of a search in milliseconds.
         */
        constructor(name = "", timeout = 30_000) {
            this.timeout = timeout;
            this.#abort = new AbortController();
            this.search(name)
        }

        /**
         * @param {string} name - The name of the product.
         * @param {number | undefined} timeout - The timeout of the search in milliseconds.
         */
        search(name = "", timeout = undefined) {
            this.#abort.abort();
            this.#abort = new AbortController();
            const self = this;
            fetchProducts(name, AbortSignal.any([this.#abort.signal, AbortSignal.timeout(timeout ?? this.timeout)]))
                .then(products => self.dispatchEvent(new CustomEvent("searchresults", {
                    detail: products
                })));
        }
    }

    /**
     * Fetches products from the API.
     * @param {string} name - The name of the product.
     * @param {AbortSignal} signal - The abort signal.
     * @param {number} page - The page number.
     * @param {number} pageSize - The page size.
     * @returns {Promise<Array<Product>>} The products.
     */
    async function fetchProducts(name = "", signal = undefined, page = 1, pageSize = 10) {
        const url = new URL(`/api/products`, window.location.origin);
        url.searchParams.set("name", name);
        url.searchParams.set("page", page);
        url.searchParams.set("pageSize", pageSize);

        const response = await fetch(url, {
            signal
        });
        return await response.json();
    }
</script>