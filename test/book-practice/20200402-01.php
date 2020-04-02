<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>20200402-01</title>
</head>
<body>
<?php
//1 計算吃飯總花費
$berger = 4.95;
$shake = 1.95;
$coke = 0.85;
$total = (2*$berger + $shake + $coke)*(1 + 0.075 + 0.16); //稅7.5% 小費16%
echo "Total with fee: $"."$total";

//2 印出帳單(含小計、稅及總計)
$title = array('menu', 'price', 'quantity', 'subtotal');
$order = array('berger', 'shake', 'coke');
$price = array($berger, $shake, $coke);
$quantity = array(2, 1, 1);
$numTitle = count($title);
$numDishes = count($order);

$subTotal = array();
for($i=0; $i<$numDishes; $i++){
    $subTotal[$i] = $price[$i] * $quantity[$i];
};
?>
    <table>
        <thead>
            <tr>
                <?php for($i=0; $i<$numTitle; $i++): ?>
                    <td><?php echo $title[$i] ?></td>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0; $i<$numDishes; $i++): ?>
            <tr>
                <td><?php echo $order[$i] ?></td>
                <td><?php echo $price[$i] ?></td>
                <td><?php echo $quantity[$i] ?></td>
                <td><?php echo $price[$i]*$quantity[$i] ?></td>
            </tr>
            <?php endfor; ?>
            <tr>
                <td>Subtotal</td>
                <?php for($i=0; $i<($numDishes - 1); $i++): ?>
                <td></td>
                <?php endfor; ?>
                <td><?php echo array_sum($subTotal); ?></td>
            </tr>
            <tr>
                <td>Tax</td>
                <?php for($i=0; $i<($numDishes - 1); $i++): ?>
                    <td></td>
                <?php endfor; ?>
                <td><?php echo array_sum($subTotal)*0.075; ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <?php for($i=0; $i<($numDishes - 1); $i++): ?>
                    <td></td>
                <?php endfor; ?>
                <td><?php echo array_sum($subTotal)*1.075; ?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>