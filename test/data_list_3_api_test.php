<?php
require __DIR__ . '/__connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$cate = isset($_GET['cate']) ? $_GET['cate'] : '';


$where = ' WHERE 1 ';

if(! empty($keyword)) {
    $where .= " AND `item_name` LIKE ". $pdo->quote("%${keyword}%"); // 跳脫
}
if(! empty($cate)) {
    $where .= " AND `cate` = ".$cate;
}

//取得總筆數
$totalRows = $pdo->query("SELECT COUNT(1) FROM `product_top` $where")
    ->fetch(PDO::FETCH_NUM)[0];

//算總頁數
$totalPages = ceil($totalRows / $perPage);

($page < 1) ? ($page = 1) : false;
($page > $totalPages) ? ($page = $totalPages) : false;

$rows = [];
// 避免沒有資料的錯誤
if($totalPages>0){
    $sql = sprintf("SELECT * FROM `product_top` %s ORDER BY `sid` DESC LIMIT %s, %s",
        $where, ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

$output = [
    'page' => $page,
    'perPage' => $perPage,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,
];

//告訴前端資料要用json格式
header('content-type:application/json');

echo json_encode($output, JSON_UNESCAPED_UNICODE);