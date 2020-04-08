<?php
require  __DIR__ . '/__connect_db.php';

if(isset($_POST['item_name']) and isset($_POST['item_num'])){

    $sql = "INSERT INTO `product_top`(
`item_name`, `item_num`, `color`, `color_num`
) VALUES (?,?,?,?, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['item_name'],
        $_POST['item_num'],
        $_POST['color'],
        $_POST['color_num'],
    ]);

    echo $stmt->rowCount(); exit;
};
?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="item_name">item-name</label>
                        <!-- 可以下pattern屬性驗證輸入的格式-->
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                        <small id="item_nameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="item_num">item-num</label>
                        <input type="text" class="form-control" id="item_num" name="item_num" required>
                        <small id="item_numHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="color">color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                        <small id="colorHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="color_num">color-num</label>
                        <input type="text" class="form-control" id="color_num" name="color_num" required>
                        <small id="color_numHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
    </div>
    <?php include __DIR__ . '/part/footer.php' ?>