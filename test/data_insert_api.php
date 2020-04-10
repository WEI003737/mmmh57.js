<?php
require  __DIR__ . '/__connect_db.php';

//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
  'success' => false,
  'error' => '資料欄位不足',
  'code' => 0,
  'postdata' => $_POST
];

if(isset($_POST['item_name']) and isset($_POST['item_num'])){
    // TODO: 欄位資料檢查

    //檢查item_num有沒有重複
    $e_sql = "SELECT 1 FROM product_top WHERE item_num=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['email']]);

    if($e_stmt->rowCount()){
        $output['error'] = 'item_num 重複了';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };

    //檢查手機格式
    /* $mobile_re = " /^09\d{2}-?\d{3}-?\d{3}$/";
    if(empty(preg_grep($mobile_re, [$_POST['mobile']]))){
        $output['error'] = '手機號碼格式不符';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }; */

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