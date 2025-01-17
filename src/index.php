<?php
require_once __DIR__ . '/i18n.php';
require_once __DIR__ . '/connect.php';

try {
    session_start();
    if (isset($_GET['at'])) {
        switch ($_GET['at']) {
            case "categories":
                require __DIR__ . '/resources/categories.php';
                break;
            case "signup":
                require __DIR__ . '/resources/signup.php';
                break;
            case "sigin":
                require __DIR__. '/views/signup.php';
                break;
            default:
                http_response_code(404);
                echo "Not found";
                break;
        }
    } else {
        require __DIR__ . '/resources/homepage.php';
    }
} catch (Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}
