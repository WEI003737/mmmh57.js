<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a20200330-01-basic</title>
</head>
<body>
<?php

//系統功能
echo PHP_VERSION.'<br>';
echo __DIR__.'<br>'; //本php檔案所在資料夾
echo __FILE__.'<br>'; //檔案完整路徑
echo __LINE__.'<br>'; //標記行數:除錯

//常數
define('MY_CONST', 3333); //define不區分大小寫
echo MY_CONST.'<br>';

//布林值不區分大小寫
echo FALSE.'<br>'; //空字串
echo true.'<br>';
?>
</body>
</html>