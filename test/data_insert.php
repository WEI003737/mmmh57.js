<?php
require  __DIR__ . '/__connect_db.php';
$page_name = 'data-insert';

if(isset($_POST['item_name']) and isset($_POST['item_num'])){

    $sql = "INSERT INTO `product_top`(
`item_name`, `item_num`, `color`, `color_num`, `creat_date`
) VALUES (?,?,?,?, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['item_name'],
        $_POST['item_num'],
        $_POST['color'],
        $_POST['color_num'],
    ]);

    if($stmt->rowCount() == 1){
        $success = true;
    }else {
        $success = false;
    };
}
?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>
    <div class="container">
        <?php if(isset($success)): ?>
            <?php if($success): ?>
            <div class="alert alert-success" role="alert">
                資料新增成功
            </div>
            <?php else: ?>
            <div class="alert alert-danger" role="alert">
                資料新增失敗
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <form method="post">
                    <div class="form-group">
                        <label for="item_name">item_name</label>
                        <!-- 可以下pattern屬性驗證輸入的格式-->
                        <input type="text" class="form-control" id="item_name" name="item_name" required
                               value="<?= isset($_POST['item_name']) ? htmlentities($_POST['item_name']): '' ?>">
                        <small id="item_nameHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="item_num">item_num</label>
                        <input type="text" class="form-control" id="item_num" name="item_num" required
                        value="<?= isset($_POST['item_num']) ? htmlentities($_POST['item_num']): '' ?>">
                        <small id="item_numHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="color">color</label>
                        <input type="text" class="form-control" id="color" name="color" required
                               value="<?= isset($_POST['color']) ? htmlentities($_POST['color']): '' ?>">
                        <small id="colorHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="color_num">color_num</label>
                        <input type="text" class="form-control" id="color_num" name="color_num" required
                               value="<?= isset($_POST['color_num']) ? htmlentities($_POST['color_num']): '' ?>">
                        <small id="color_numHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
    </div>
    <?php include __DIR__ . '/part/footer.php' ?>