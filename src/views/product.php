<link rel="stylesheet" href="assets/product.css?v=1.0">
<div class="product-info"></div>

<script>
    const product = document.querySelector(".product-info");
    product.addEventListener("tdiw-refresh", () => {
        const params = new URLSearchParams();
        params.set("id", window.tdiw_product_id);

        fetch(`${window.location.pathname}controllers/product.php?${params}`).then(resp => resp.json()).then((body) => {
            const img = document.createElement("img")
            img.src = body.img;

            const name = document.createElement("h1");
            name.textContent = body.name;

            const description = document.createElement("p");
            description.textContent = body.description;

            const price = document.createElement("span");
            price.textContent = MONEY_FORMAT.format(body.price / 100);

            const addQuantity = document.createElement("input");
            addQuantity.type = "number"
            addQuantity.min = "1"
            addQuantity.valueAsNumber = 1

            const addToCart = document.createElement("button");
            addToCart.textContent = "Add to Cart";
            addToCart.addEventListener("click", async () => {
                addToCart.disabled = true
                try {
                    const resp = await fetch(`${window.location.pathname}controllers/addToCart.php`, {
                        method: "post",
                        headers: {
                            "content-type": "application/x-www-form-urlencoded"
                        },
                        body: new URLSearchParams({
                            item: body.id,
                            count: addQuantity.valueAsNumber
                        })
                    });

                    if (resp.ok)
                        document.dispatchEvent(new Event("tdiw-refresh-footer"));
                } finally {
                    addToCart.disabled = false
                }
            })

            const info = document.createElement("div");
            info.classList.add("info");
            info.append(name, price, description, addQuantity, addToCart);

            product.replaceChildren(img, info)
        })
    });
</script>
