<?php include_once __DIR__ . '/../../../../templates/header.php';?>
    <div class="сontent">
    <?php foreach ($products as $id => $product) : ?>
        <div class="products">
            <img src="<?= $product['image'] ?>" width="200" height="200">
            <a href="/product/<?= $id ?>">
                <div><?= $product['name'] ?></div>
            </a>
            <div><?= $product['description'] ?></div>
            <div>Цена: <?= $product['price'] ?> USD</div>
        </div>
    <?php endforeach ?>
</div>
<?php include_once __DIR__ . '/../../../../templates/footer.php';?>
