<link rel="stylesheet" href="/assets/product.css">

<div class="product"></div>

<script>
    const product = document.querySelector(".product");
    const url = new URL(`/api/product.php`, window.location.href)
    url.searchParams.set("id", <?= $id ?>);

    fetch(url).then(resp => resp.json()).then((body) => {
        const img = document.createElement("img")
        img.src = body.img;

        const name = document.createElement("h1");
        name.innerHTML = body.name;

        const description = document.createElement("p");
        description.innerHTML = body.description;

        const price = document.createElement("span");
        price.innerHTML = MONEY_FORMAT.format(body.price / 100);

        const info = document.createElement("div");
        info.append(name, price, description);

        product.replaceChildren(img, info)
    })
</script>
