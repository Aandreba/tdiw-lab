/**
 * @typedef {Object} Product
 * @property {number} id
 * @property {string} name
 * @property {string} description
 * @property {string} img
 * @property {number} price
 * @property {number} category_id
 */

export default class ProductSearchEngine extends EventTarget {
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
     * @param {number | null} category - The category of the product.
     * @param {number} timeout - The default timeout of a search in milliseconds.
     */
    constructor(name = "", category = null, timeout = 30_000) {
        super();
        this.timeout = timeout;
        this.#abort = new AbortController();
        this.search(name, category)
    }

    /**
     * @param {string} name - The name of the product.
     * @param {number | null} category - The category of the product.
     * @param {number | undefined} timeout - The timeout of the search in milliseconds.
     */
    search(name = "", category = null, timeout = undefined) {
        this.#abort.abort();
        this.#abort = new AbortController();
        const self = this;
        fetchProducts(name, category, AbortSignal.any([this.#abort.signal, AbortSignal.timeout(timeout ?? this.timeout)]))
            .then(products => self.dispatchEvent(new CustomEvent("searchresults", {
                detail: products
            })));
    }
}

/**
 * Fetches products from the API.
 * @param {string} name - The name of the product.
 * @param {number | null} category - The category of the product.
 * @param {AbortSignal | undefined} signal - The abort signal.
 * @param {number} page - The page number.
 * @param {number} pageSize - The page size.
 * @returns {Promise<Array<Product>>} The products.
 */
async function fetchProducts(name = "", category = null, signal = undefined, page = 1, pageSize = 10) {
    const url = new URL(`${window.location.pathname}api/products.php`);
    // url.protocol = "http";

    const params = new URLSearchParams()
    params.set("name", name);
    if (category !== null) params.set("category", category);
    params.set("page", page);
    params.set("pageSize", pageSize);

    const response = await fetch(`${window.location.pathname}/api/products.php?${params}`, {
        signal
    });
    return await response.json();
}
