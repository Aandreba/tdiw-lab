<?php
if (!isset($_SESSION["user"])) {
    header("Location: /lab");
    exit;
}

require __DIR__ . '/../views/head.php';
?>

<body>
    <?php
    require __DIR__ . '/../controllers/navbar.php';
    require __DIR__ . '/../controllers/orders.php';
    require __DIR__ . '/../views/footer.php';
    ?>
</body>

</html>
