<link rel="stylesheet" href="assets/orders.css?v=1.0">

<?php foreach ($orders as $key => $order): ?>
    
    <div>
        <span><?= $order["creation_date"] ?></span>
        <span><?= round($order["total"] / 100, 2) ?>€</span>
        <ul>
            <?php foreach ($order["items"] as $item): ?>
                <li><?= $item["name"] ?> - <?= $item["quantity"] ?> x <?= round(intval($item["price"]) / 100, 2) ?>€</li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endforeach; ?>

