<?php
$n = isset($_GET['n']) ? intval($_GET['n']) : 0;
?>
    <form action="" method="get">
        <input type="number" name="n" value="<?php echo $n ?>">
        <input type="submit" value="submit">
    </form>
<?php

$nn = intval($n/10);
switch ($nn){
    case 10:
    case 9:
        $g = 'A';
        break;
    case 8:
        $g = 'B';
        break;
    case 7:
        $g = 'C';
        break;
    case 6:
        $g = 'D';
        break;
    default:
        $g = 'E';
        break;
}
//if($n>=90){
//    $g = 'A';
//}else {
//    if($n>=80){
//        $g = 'B';
//    }else {
//        if($n>=70){
//            $g = 'C';
//        }else{
//            if($n>=60){
//                $g = 'D';
//            }else{
//                $g = 'F';
//            }
//        }
//    }
//}
echo $g;


?>