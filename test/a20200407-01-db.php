<?php
require __DIR__. '/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM product_top");
$row = $stmt->fetchAll(); //fetch()/fetchAll()

//print_r($row);
echo json_encode($row)
?>