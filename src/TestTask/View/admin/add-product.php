<?php include_once __DIR__ . '/../../../../templates/header.php';?>
    <h4>Добавить продукт</h4>
    <div class="сontent">
        <span style="color: red;"><?= $error ?? '' ?></span>
        <span style="color: green;"><?= $message ?? '' ?></span>
        <form action="" method="post">
            <input type="text" name="name" placeholder="название продукта"><br>
            <input type="text" name="image" placeholder="ссылка на картинку"><br>
            <textarea name="description" placeholder="описание продукта"></textarea><br>
            <input type="text" name="price" placeholder="цена"><br>
            <select name="category">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit">
        </form>
    </div>
<?php include_once __DIR__ . '/../../../../templates/footer.php';?>
