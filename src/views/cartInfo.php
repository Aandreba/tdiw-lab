<link rel="stylesheet" href="assets/carritoCss.css?v=1.0">

<ul id="cartinfo">
    <?php foreach ($cart_items as $entry): ?>
        <?php
        $item = $entry[0];
        $count = $entry[1];
        ?>
        <li>
            <span><?= htmlentities($item->name, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></span>
            <span class="price"><?= number_format($item->price / 100, 2) ?></span>
            <input class="elem_count" type="number" min="1" value="<?= $count ?>" onchange="setCartProdCount(<?= $item->id ?>, this)" />
            <button class="remove_cart" onclick="setCartProdCount(<?= $item->id ?>, 0)">Remove</button>
        </li>
    <?php endforeach; ?>
</ul>

<button onclick="clearCart()">Clear</button>
<? if (isset($_SESSION["user"])): ?>
    <button onclick="submitCart()">Submit</button>
<? endif ?>

<div id="successModal" class="modal">
    <div class="modal-content">
        <p>Purchase completed successfully</p>
        <button onclick="closeModal()">OK</button>
    </div>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    .modal-content p {
        margin-bottom: 20px;
        font-size: 18px;
    }

    .modal-content button {
        padding: 10px 20px;
        font-size: 16px;
    }
</style>

<script>
    const invisible_form = document.createElement("form");
    invisible_form.style.display = "none";
    invisible_form.method = "post";
    invisible_form.action = `${window.location.pathname}?at=cart`;

    const if_action = document.createElement("input");
    if_action.type = "text";
    if_action.name = "action";
    const if_id = document.createElement("input");
    if_id.type = "number";
    if_id.name = "id";
    const if_count = document.createElement("input");
    if_count.type = "number";
    if_count.name = "count";

    invisible_form.append(if_action, if_id, if_count);
    document.body.append(invisible_form);

    function setCartProdCount(id, count_or_event) {
        if_action.value = "set";
        if_id.valueAsNumber = id;
        if_count.valueAsNumber = (count_or_event instanceof HTMLInputElement) ? count_or_event.valueAsNumber : count_or_event;
        invisible_form.submit();
    }

    function showModal() {
        const modal = document.getElementById("successModal");
        modal.style.display = "block";
    }

    function closeModal() {
        const modal = document.getElementById("successModal");
        modal.style.display = "none";
        localStorage.removeItem("purchaseComplete");
    }

    function submitCart() {
        if_action.value = "submit";
        invisible_form.submit();
        localStorage.setItem("purchaseComplete", "true");
    }

    function clearCart() {
        if_action.value = "clear";
        invisible_form.submit();
    }

    window.addEventListener("load", () => {
        if (localStorage.getItem("purchaseComplete") === "true") {
            showModal();
        }
    });

    for (const elem of document.querySelectorAll("#cartinfo span.price")) {
        elem.textContent = money_fmt.format(parseInt(elem.textContent));
    }
</script>
