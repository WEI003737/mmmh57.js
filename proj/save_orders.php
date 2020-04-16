<?php
require __DIR__. '/__connect_db.php';

//array_keys
//Return all the keys or a subset of the keys of an array
$pKeys = array_keys($_SESSION['cart']);

$rows = []; // 預設值
$data_ar = []; // dict

// 有登入才能結帳
if(! isset($_SESSION['loginUser'])){
    header('Location: product_list.php');
    exit;
}


if(!empty($pKeys)) {
    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys)); //$pKeys 裡面只有一樣東西
    $rows = $pdo->query($sql)->fetchAll();
    $total = 0;
    foreach($rows as $r){
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
        $total += $r['quantity'] * $r['price'];
    }
} else {
    header('Location: product_list.php');
    exit;
}

$o_sql = "INSERT INTO `orders`(`member_sid`, `amount`, `order_date`) VALUES (?, ?, NOW())";
$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION['loginUser']['sid'],
    $total,
]);

$order_sid = $pdo->lastInsertId(); // 最近新增資料的 PK


$od_sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`, `quantity`) VALUES (?, ?, ?, ?)";
$od_stmt = $pdo->prepare($od_sql);

foreach($_SESSION['cart'] as $p_sid=>$qty){
    $od_stmt->execute([
        $order_sid,
        $p_sid,
        $data_ar[$p_sid]['price'],
        $qty,
    ]);
}

unset($_SESSION['cart']); // 清除購物車內容
?>
<?php include __DIR__ . '/part/header.php'; ?>
<?php include __DIR__ . '/part/nav.php'; ?>

    <div class="container">
        <div class="alert alert-success" role="alert">
            感謝訂購 <?= $order_sid ?>
        </div>

    </div>
<?php include __DIR__ . '/part/scripts.php'; ?>

<?php include __DIR__ . '/part/footer.php'; ?>