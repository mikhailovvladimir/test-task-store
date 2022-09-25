<?php include_once __DIR__ . '/../../../../templates/header.php';?>
    <div class="сontent">
        <table border="3px" cellpadding="15">
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Изображение</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $id => $product): ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><img width="100" height="100" src="<?= $product['image'] ?>"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
<?php include_once __DIR__ . '/../../../../templates/footer.php';?>
