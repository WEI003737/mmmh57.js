<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a20200330-02-basic</title>
</head>
<body>
<?php

$my = 123;
$a = '55';
$b = 'abc';
echo $my + $a; // + 只做數值相加
echo '<br>';
echo $a.$b; //字串相加要用 .
echo '<br>';

$c = 'Shinder';
echo 'My name is $c<br>'; //單引號會呈現原本的內容
echo "My name is $c<br>"; //雙引號會把變數用變數值取代
echo "My name is {$c}<br>";
echo "My name is ${c}<br>";
echo "My name is $c123<br>"; //notice

?>
</body>
</html>