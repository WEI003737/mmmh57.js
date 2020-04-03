<?php
//1
function img($url,$alt){
    print "<img src='$url' alt='width/height: $alt.'/>";
};
img("./images/example.png","800px/600px");
echo "<br>";

//2
function img2($imgName){
    print "<img src='./images/$imgName'/>";
};
img2("example.png");
echo "<br>";

//5 將以十進位參數寫成的紅綠藍轉成十六進位
//解答1 => 全都會補0...怪怪的
function colorSwitch($red,$green,$blue){
    $hex = [dechex($red),dechex($green),dechex($blue)];
    foreach ($hex as $i => $val){
        if(strlen($i) < 1){
            $hex[$i] = "0$val";
        }
    }
    print "#".implode('',$hex);
};
colorSwitch(255,0,255);

echo "<br>";
//解答2 => 超快速
//sprintf: %x => 16進位 / %0 => 補0 / %2
function colorSwitch2($red,$green,$blue){
    print sprintf("#%02x%02x%02x",$red,$green,$blue);
};
colorSwitch2(255,0,255);
?>