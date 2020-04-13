<?php
require __DIR__ . '/__connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//取得總筆數
$totalRows = $pdo->query("SELECT COUNT(1) FROM `product_top`")->fetch(PDO::FETCH_NUM)[0];

//算總頁數
$totalPages = ceil($totalRows / $perPage);

($page < 1) ? ($page = 1) : false;
($page > $totalPages) ? ($page = $totalPages) : false;


$sql = sprintf("SELECT * FROM `product_top` LIMIT %s,%s", ($page - 1) * $perPage, $perPage);

$stmt = $pdo->query($sql);

$output = [
    'page' => $page,
    'perPage' => $perPage,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $stmt->fetchAll(),
];

//告訴前端資料要用json格式
header('content-type:application/json');

echo json_encode($output, JSON_UNESCAPED_UNICODE);