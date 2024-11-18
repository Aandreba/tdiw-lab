<?php

function GetPagination() {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $pageSize = isset($_GET['pageSize']) ? intval($_GET['pageSize']) : 10;
    return [
        'limit' => $pageSize,
        'offset' => ($page - 1) * $pageSize,
    ];
}
