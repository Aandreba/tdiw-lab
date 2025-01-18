<?php require __DIR__ . '/../views/head.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="assets/home.css?v=1.0">
</head>

<body>
    <?php require __DIR__ . '/../controllers/navbar.php'; ?>
    
    <div class="homepage-container">
        <div class="image-container">
            <img src="assets/icons/portada.png" alt="Inicio" class="homepage-image">
            <div class="button-container">
                <a href="/lab/?at=categories" class="btn">BUY NOW!</a>
            </div>
        </div>
    </div>
    <?php require __DIR__ . '/../views/footer.php'; ?>
</body>
</html>
