<?php
require __DIR__ . '/../models/product.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit;
}

$id = intval($_GET['id']);
?>

<?php require __DIR__ . '/../views/head.php'; ?>
<body>
<?php
    require __DIR__ . '/../views/navbar.php';
    require __DIR__ . '/../views/product.php';
?>
</body>
</html>
