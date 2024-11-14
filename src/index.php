<?php
session_start();

if(!isset($_SESSION['total'])){
    $_SESSION['total']= 0.00;
}


if(!isset($_SESSION['items'])){
    $_SESSION['items']= 0;
}

$action = $_GET['action'] ?? NULL;

switch($action) {
    case 'login':
        include __DIR__
        break;
    
    case 'product_list'
        include __DIR__
        break;
    
    case 'orders'
        include __DIR__
        break;
    
    case
}
?>
