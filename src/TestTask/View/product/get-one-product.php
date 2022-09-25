<?php include_once __DIR__ . '/../../../../templates/header.php';?>
    <div class="сontent">
            <h2><div><?= $product['name'] ?></div></h2>
            <div class="products">
                <img src="<?= $product['image'] ?>" width="400" height="400"><br>
                <div><?= $product['description'] ?></div>
                <div>Цена: <?= $product['price'] ?> USD</div>
            </div>
    </div>
<?php include_once __DIR__ . '/../../../../templates/footer.php';?>
