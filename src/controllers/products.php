<?php

$category = isset($_GET['category']) ? intval($_GET['category']) : null;

require __DIR__ . '/../views/productsList.php';
