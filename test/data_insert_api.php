<?php
require  __DIR__ . '/__connect_db.php';

$output = [
  'success' => false,
  'error' => '資料欄位不足',
  'code' => 0,
];

if(isset($_POST['item_name']) and isset($_POST['item_num'])){
    // TODO: 欄位資料檢查
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
        $output['success'] = true;
        $output['error'] = '';
    }else {
        $output['error'] = '資料無法新增';
    };
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);