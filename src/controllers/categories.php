<?php

require_once __DIR__ . '/../models/category.php';

$page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
$pageSize = intval(isset($_GET['pageSize']) ? $_GET['pageSize'] : 10);

$categories = Category::FetchAll($page, $pageSize);
require __DIR__ . '/../views/categoryList.php';
