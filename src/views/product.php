<link rel="stylesheet" href="assets/product.css">

<div class="product"></div>

<script>
    const product = document.querySelector(".product");
    const params = new URLSearchParams();
    params.set("id", <?= $id ?>);

    fetch(`${window.location.pathname}controllers/product.php?${params}`).then(resp => resp.json()).then((body) => {
        const img = document.createElement("img")
        img.src = body.img;

        const name = document.createElement("h1");
        name.textContent = body.name;

        const description = document.createElement("p");
        description.textContent = body.description;

        const price = document.createElement("span");
        price.textContent = MONEY_FORMAT.format(body.price / 100);

        const info = document.createElement("div");
        info.classList.add("info");
        info.append(name, price, description);

        product.replaceChildren(img, info)
    })
</script>
