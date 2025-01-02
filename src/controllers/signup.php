<?php

require_once __DIR__ . "/../models/user.php";

try {
    session_start();
    $_SESSION["user"] = User::SignUp($_POST["username"], $_POST["email"], $_POST["password"], $_POST["address"], $_POST["city"], $_POST["zip"]);
    header("Location: ../?at=categories");
} catch (Exception $e) {
    http_response_code(400);
    echo $e->getMessage();
}
