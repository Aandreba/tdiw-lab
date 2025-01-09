<?php
$category = isset($_GET['category']) ? intval($_GET['category']) : null;
?>

<?php require __DIR__ . '/../views/head.php'; ?>

<body>
    <?php
    require __DIR__ . '/../controllers/navbar.php';
    require __DIR__ . '/../views/productsList.php';
    require __DIR__ . '/../views/footer.php';
    ?>
</body>

</html>
