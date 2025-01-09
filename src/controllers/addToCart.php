<?php

session_start();
require_once __DIR__ . '/../cart.php';

if (!isset($_POST["item"]) || !isset($_POST["count"])) {
    http_response_code(400);
    exit;
}

$item = intval($_POST["item"]);
$count = intval($_POST["count"]);

addCartProduct($item, $count);
