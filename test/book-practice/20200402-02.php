<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>20200402-02</title>
</head>
<body>
<?php
//1
if ("zero") {
    echo "true";
} else {
    echo "false";
};
echo "<br>";
?>


<table>
    <tr>
        <td>Fahrenheit (F)</td>
        <td>Celsius (C)</td>

    </tr>
    <?php
    //2
    $f = -50;
    while ($f <= 50){ ?>
    <tr>
        <td>
            <?php echo $f;
            $f += 5;
            ?>
        </td>
        <td>
            <?php
            $c = ($f - 32)*5/9;
            echo round($c);
            $f += 5;
            ?>
        </td>
    </tr>
    <?php };?>
</table>
</body>
</html>