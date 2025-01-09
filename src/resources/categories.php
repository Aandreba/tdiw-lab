<?php
require_once __DIR__ . '/../models/category.php';
require_once __DIR__ . '/../pagination.php';

$page = GetPagination();
$categories = Category::FetchAll($page['limit'], $page['offset']);
?>

<?php require __DIR__ . '/../views/head.php'; ?>

<body>
    <?php
    require __DIR__ . '/../controllers/navbar.php';
    require __DIR__ . '/../views/categoryList.php';
    require __DIR__ . '/../views/footer.php';
    ?>
</body>

</html>
