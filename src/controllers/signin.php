<?php

require_once __DIR__ . '/../models/user.php';

if (isset($_SESSION["user"])) {
    header("Location: /");
    exit;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    try {
        $user = User::SignIn($_POST["email"], $_POST["password"]);
        if ($user == null) {
            http_response_code(404);
            $_SESSION["error"] = "Invalid email/password combination";
        } else {
            $_SESSION["user"] = $user->id;
            header("Location: /");
            exit;
        }
    } catch (Exception $e) {
        http_response_code(404);
        $_SESSION["error"] = $e->getMessage();
    }
} else {
    unset($_SESSION["error"]);
}

include __DIR__ . '/../views/signin.php';
