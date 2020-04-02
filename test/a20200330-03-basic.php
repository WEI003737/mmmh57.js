
<?php
    //isset用來查看 a 的 query string 參數有沒有被設定
    $a = isset($_GET['a']) ? intval($_GET['a']) : 10;
    $b = isset($_GET['b']) ? intval($_GET['b']) : 0;

    echo $a + $b;
    echo '<br>';

    echo '<table><tr>';
    for($i=1; $i<=$a; $i++){
        echo "<td>$i</td>";
    }
    echo '</tr></table>';

    echo '<table>';
    for($i=1; $i<=$a; $i++){
        echo "<tr><td>$i</td></tr>";
    }
    echo '</table>';
?>