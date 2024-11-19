<?php

require_once __DIR__ . "/../models/user.php";

try {
    session_start();
    $user = User::SignUp($_POST["username"], $_POST["email"], $_POST["password"]);
    $_SESSION["user"] = $user->id;
    header("Location: /?at=categories");
} catch (Exception $e) {
    http_response_code(400);
    echo $e->getMessage();
}
