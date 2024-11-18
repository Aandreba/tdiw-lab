<?php

require_once __DIR__ . '/../models/category.php';
require_once __DIR__ . '/../pagination.php';

$page = GetPagination();
$categories = Category::FetchAll($page['limit'], $page['offset']);
require __DIR__ . '/../views/categoryList.php';
