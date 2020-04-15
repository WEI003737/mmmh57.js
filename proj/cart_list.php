<?php
require __DIR__.'/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);
if(!empty($pKeys)){
    $sql = sprintf("SELECT *FROM products WHERE sid IN(%s)",implode(',',$pKeys));
    $rows = $pdo->query($sql)->fetchAll();

    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;

    }
};
?>
<?php include __DIR__ . '/part/header.php' ?>
<?php include __DIR__ . '/part/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">del</th>
                        <th scope="col">封面</th>
                        <th scope="col">商品</th>
                        <th scope="col">價錢</th>
                        <th scope="col">數量</th>
                        <th scope="col">小計</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($_SESSION['cart'] as $sid => $qty):
                        $item = $data_ar[$sid];
                        ?>
                    <tr data-sid="<?= $sid ?>">
                        <td>del</td>
                        <td><img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt=""></td>
                        <td><?= $item['bookname'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><input type="number" class="form-control" value="<?= $item['quantity'] ?>" onchange="changeQty(event)"></td>
                        <td><?= $item['price']*$item['quantity'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>

                    </div>
                </table>
            <div class="alert alert-info" role="alert">
                  總計: <span id="totalAmount"><?= $total ?></span>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/part/scripts.php'; ?>
    <script>

        function changeQty(event){

        }

    </script>
<?php include __DIR__ . '/part/footer.php' ?>