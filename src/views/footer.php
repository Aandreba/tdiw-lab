<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
-->
<link rel="stylesheet" href="assets/footer.css?v=1.0">

<footer>
    <span id="cart-price"></span>
    <span id="cart-count"></span>
</footer>

<script>
    const footer = document.querySelector("footer");
    const cart_price = footer.querySelector("#cart-price");
    const cart_count = footer.querySelector("#cart-count");
    let aborter = null;

    async function reloadCartInfo() {
        const new_aborter = new AbortController();
        if (aborter !== null) aborter.abort();
        aborter = new_aborter;
        const resp = await fetch(`${window.location.pathname}controllers/footer.php`, {
            signal: aborter.signal
        });
        const json = await resp.json();
        cart_price.textContent = `Total: ${money_fmt.format(json["price"] / 100)}`;
        cart_count.textContent = `Items: ${json["count"]}`;
    }

    document.addEventListener("tdiw-refresh-footer", reloadCartInfo);
    reloadCartInfo();
</script>
