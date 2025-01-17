<?php
require_once __DIR__ . '/../models/category.php';
require_once __DIR__ . '/../pagination.php';

$page = GetPagination();
$categories = Category::FetchAll($page['limit'], $page['offset']);

include __DIR__ . '/../views/categoryList.php';
