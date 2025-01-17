<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/loginCSS.css?v=1.0"> 
    <title>Log In</title>
</head>

<body>
    <h1>Log In</h1>
    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post" class="logIn">
        <div class="input-wrapper">
            <label for="login-email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-wrapper">
            <label for="login-pass">Password:</label>
            <input type="password" name="password" required>
        </div>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert-error">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <div class="input-wrapper">
            <input type="submit" id="Login" value="Log In">
        </div>
    </form>
</body>

</html>
