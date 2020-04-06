<?php
//3 印出名字及字串總長度
$firstName = "Wei Chun";
$lastName = "Lin";
$nameLen = strlen($firstName) + strlen($lastName);
echo "Your name: ".$firstName." ".$lastName;
echo "<br>";
echo "Length of your name: ".$nameLen;
echo "<br>";

//4
for($i=1; $i<6; $i++){
    echo $i; //印出數字1~5
};
echo "<br>";
for($i=1; $i<6; $i++){
    echo 2**$i; //印出2的1到5次方
};

?>
