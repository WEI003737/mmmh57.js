<?php

require __DIR__ .'/__connect_db.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$sql = 'DELETE FROM `product_top` WHERE `sid`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$sid]);
/*
echo json_encode([
    'rowcount' => $stmt->rowCount()
]);
*/

//哪裡來哪裡去
if(empty($_SERVER['HTTP_REFERER']))
    header('Location: data_list.php');
else
    header('Location: '. $_SERVER['HTTP_REFERER']);
