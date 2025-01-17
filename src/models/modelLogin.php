<?php
session_start();
require __DIR__.'/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT id_user, password FROM users WHERE email = $1";

    $stmt = pg_prepare($conn, "login_query", $sql);

    $result = pg_execute($conn, "login_query", array($email));

    if ($result) {

        $user = pg_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id_user'] = $user['id_user'];
            header("Location: https://tdiw-j7.deic-docencia.uab.cat/index.php");
            
        } else {
            $_SESSION['error'] = "Correo electrónico o contraseña incorrectos. Por favor, inténtalo de nuevo.";
            header("Location: https://tdiw-j7.deic-docencia.uab.cat/index.php?action=login"); 
            exit;
        }
    } else {
        echo "El usuario no existe.";
        header("Location: https://tdiw-j7.deic-docencia.uab.cat/index.php?action=login"); 
        exit;
    }

    pg_close($conn);
}
?>