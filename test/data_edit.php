<?php
$page_name = 'data-edit';
require __DIR__ . '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location: data_list.php');
    exit;
};

$sql = "SELECT * FROM product_top WHERE sid=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$sid]);
$row = $stmt->fetch();

if (empty($row)) {
    header('Location: data_list.php');
    exit;
};

?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>
    <style>
        .form-group small.form-text {
            color: red;
        }
    </style>
    <div class="container">
        <div id="info-bar" class="alert alert-success" role="alert" style="display: none">
            123
        </div>
        <div class="row">
            <div class="col">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">資料修改</h5>
                        <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                            <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                            <div class="form-group">
                                <label for="item_name">* item_name</label>
                                <!-- 可以下pattern屬性驗證輸入的格式-->
                                <input type="text" class="form-control" id="item_name" name="item_name" required
                                       value="<?= htmlentities($row['item_name']) ?>">
                                <small id="item_name_help" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="item_num">* item_num</label>
                                <input type="text" class="form-control" id="item_num" name="item_num" required
                                       value="<?= htmlentities($row['item_num']) ?>">
                                <small id="item_num_help" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="color">color</label>
                                <input type="text" class="form-control" id="color" name="color" required
                                       value="<?= htmlentities($row['color']) ?>">
                                <small id="color_help" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="color_num">color_num</label>
                                <input type="text" class="form-control" id="color_num" name="color_num" required
                                       value="<?= htmlentities($row['color_num']) ?>">
                                <small id="color_num_help" class="form-text"></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
<?php include __DIR__ . '/part/scripts.php'; ?>
    <script>
        const $item_name = $("#item_name"),
            $item_num = $("#item_num"),
            $color = $("#color"),
            $color_num = $("#color_num"),
            $item_name_help = $("#item_name_help"),
            $item_num_help = $("#item_num_help"),
            $info = $("#info-bar");

        function checkForm() {
            let isPass = true; //有沒有通過檢查
            //回復提示設定
            $("#info-bar").hide();
            $item_name.css('border-color', '#ccc');
            $item_name_help.text('');

            $item_num.css('border-color', '#ccc');
            $item_num_help.text('');


            if ($item_name.val().length < 1) {
                $item_name.css('border-color', 'red');
                $item_name_help.text('請填寫商品類別');
                isPass = false;
            }
            if ($item_num.val().length < 1) {
                $item_num.css('border-color', 'red');
                $item_num_help.text('請填寫商品編號');
                isPass = false;
            }


            if (isPass) {
                $.post('data_edit_api.php', $(document.form1).serialize(), function (data) {
                    if (data.success) {
                        $info.removeClass('alert-danger').addClass('alert-success');
                        $info.show().text('修改成功');
                    } else {
                        $info.removeClass('alert-success').addClass('alert-danger');
                        $info.show().text(data.error);
                    }
                }, 'json');
            }

            return false;
        }

    </script>
<?php include __DIR__ . '/part/footer.php' ?>