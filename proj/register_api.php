<?php
require  __DIR__ . '/__connect_db.php';

//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
  'success' => false,
  'error' => '資料欄位不足',
  'code' => 0,
  'postData' => $_POST
];

if(isset($_POST['email']) and isset($_POST['name']) and isset($_POST['mobile']) and isset($_POST['password'])){
    // TODO: 欄位資料檢查

    //檢查email有沒有重複
    $e_sql = "SELECT 1 FROM member WHERE email=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['email']]);

    if($e_stmt->rowCount()){
        $output['error'] = 'email 重複了';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };

    //檢查手機格式
     $mobile_re = " /^09\d{2}-?\d{3}-?\d{3}$/";
    if(empty(preg_grep($mobile_re, [$_POST['mobile']]))){
        $output['error'] = '手機號碼格式不符';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };

    $sql = "INSERT INTO `member`(
`email`, `password`, `name`, `nickname`, `mobile`, `address`, `created_date`
) VALUES (?,?,?,'',?,'', NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['email'],
        $_POST['password'],
        $_POST['name'],
        $_POST['mobile'],


    ]);

    if($stmt->rowCount() == 1){
        $output['success'] = true;
        $output['error'] = '';
    }else {
        $output['error'] = '資料無法新增';
    };
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);