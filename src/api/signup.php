<?php

require_once __DIR__ . "/../models/user.php";

try {
    session_start();
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $user = User::SignUp($_POST["username"], $email, $_POST["password"]);
    $_SESSION["user"] = $user->id;
    header("Location: /?at=categories");
} catch (Exception $e) {
    http_response_code(400);
    echo $e->getMessage();
}
