<?php foreach ($categories as $row):
    $nom = $row['name_category']
    <div class="man">
        <a href="index.php?action=llistar-prods&category=<?php echo $row['id_category']; ?>">
            <h1 id=<?php echo $row['id_category']; ?>><?php echo htmlentities($nom); ?></h1>
        </a>
    </div>
<?php endforeach; ?>
