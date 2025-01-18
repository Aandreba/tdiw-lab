<?php

require_once __DIR__ . '/../pagination.php';
require_once __DIR__ . '/../models/order.php';

$pagination = GetPagination();
$orders = GetOrdersList(intval($_SESSION["user"]), $pagination["offset"], $pagination["limit"]);
