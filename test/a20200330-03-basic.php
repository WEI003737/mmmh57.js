<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a20200330-03-basic</title>
</head>
<body>
<?php
    $a = isset($_GET['a']) ? intval($_GET['a']) : 0;
    $b = isset($_GET['b']) ? intval($_GET['b']) : 0;

    echo $a + $b;
    echo '<br>';

    echo '<table><tr>';
    for($i=1; $i<=$a; $i++){
        echo "<td>$i</td>";
    }
    echo '</tr></table>';

?>
</body>
</html>