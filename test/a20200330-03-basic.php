
<?php
    //isset用來判斷有沒有設定過此變數
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