<?php

$db_host = 'localhost';
$db_name = 'proj57';
$db_user = 'root';
$db_pass = '';

$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db_host, $db_name);

$pdo_options = [
    //設定資料庫錯誤時的例外
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //使用fetch style: 關聯式陣列
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];

try{
  $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
}catch (PDOException $ex){
    echo 'Ex:'. $ex->getMessage();
}

