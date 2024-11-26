<?php
try {
    require_once __DIR__ . '/i18n.php';
    $page = isset($_GET['at']) ? $_GET['at'] : null;
    session_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <script src="assets/i18n.js"></script>
    </head>

    <body>
        <?php require __DIR__ . '/views/navbar.php'; ?>
        <main>
            <?php
            switch ($page) {
                case "categories":
                    require __DIR__ . '/controllers/categories.php';
                    break;
                case "products":
                    require __DIR__ . '/controllers/products.php';
                    break;
                case "product":
                    require __DIR__ . '/controllers/product.php';
                    break;
                case "signup":
                    require __DIR__ . '/controllers/signup.php';
                    break;
                default:
                    http_response_code(404);
                    echo "Not found";
                    break;
            }
            ?>
        </main>

    </body>

    </html>
<?php
} catch (Exception $e) {
    echo "ERROR\n";
    // http_response_code(500);
    echo $e->getMessage();
}
?>
