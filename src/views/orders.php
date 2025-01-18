<link rel="stylesheet" href="assets/orders.css?v=1.0">

<div class="orders-container">
    <?php foreach ($orders as $key => $order): ?>
        <div class="order">
            <span class="order-date"><?= $order["creation_date"] ?></span>
            <span class="order-total"><?= round($order["total"] / 100, 2) ?>€</span>
            <ul class="order-items">
                <?php foreach ($order["items"] as $item): ?>
                    <li><?= $item["name"] ?> - <?= $item["quantity"] ?> x <?= round(intval($item["price"]) / 100, 2) ?>€</li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
