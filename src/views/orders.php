
<link rel="stylesheet" href="assets/orders.css?v=1.0">

<? foreach ($orders as $order): ?>
    <div>
        <span><?= $order["creation_date"] ?></span>
        <span><?= round($order["total"] / 100, 2) ?>€</span>
        <ul>
            <? foreach ($order["items"] as $item): ?>
                <li><?= $item["name"] ?> - <?= $item["quantity"] ?> x <?= round($item["price"] / 100, 2) ?>€</li>
            <? endforeach ?>
        </ul>
    </div>
<? endforeach ?>
