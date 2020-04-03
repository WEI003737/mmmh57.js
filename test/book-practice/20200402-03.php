<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>20200402-03</title>
    <style>
        .title{
            background: #e0a800;
        }
    </style>
</head>
<body>
<?php
$data = array(
    array("New York", "Los Angeles", "Chicago", "Houston", "Philadelphia", "Phoenix", "San Antonio", "San Diego", "Dallas", "San Jose"),
    array("NY", "CA", "IL", "TX", "PA", "AZ", "TX", "CA", "TX", "CA"),
    array("8175133", "3792621", "2695598", "2100263", "1526006", "1445632", "1327407", "1307402", "1197816", "945942"));

$data2 = [["New York", "NY", "8175133"],["Los Angeles", "CA", "3792621"],["Chicago", "IL", "2695598"],["Houston", "TX", "2100263"],["Philadelphia", "PA", "1526006"],["Phoenix", "AZ", "1445632"],["San Antonio", "TX", "1327407"],["San Diego", "CA", "1307402"],["Dallas", "TX", "1197816"],["San Jose", "CA", "945942"]];
$data3 = array("New York" => array("state" => "NY",
            "pop" => "8175133"),
    "Los Angeles" => array("state" => "CA",
                "pop" => "3792621"),
    "Chicago" => array("state" => "IL",
                "pop" => "2695598"),
    "Houston" => array("state" => "TX",
                "pop" => "2100263"),
    "Philadelphia" => array("state" => "PA",
                "pop" => "1526006"),
    "Phoenix" => array("state" => "AZ",
                "pop" => "1445632"),
    "San Antonio" => array("state" => "TX",
                "pop" => "1327407"),
    "San Diego" => array("state" => "CA",
                "pop" => "1307402"),
    "Dallas" => array("state" => "TX",
                "pop" => "1197816"),
    "San Jose" => array("state" => "CA",
                "pop" => "945942"));
?>
<table>
    <tr class="title">
        <td>City</td>
        <td>State</td>
        <td>Population</td>
    </tr>
    <?php for($i=0,$numData = count($data); $i<=0; $i++) {
        for($j=0,$numSub = count($data[$i]); $j<$numSub; $j++){?>
            <tr>
                <td><?php echo $data[0][$j]; ?></td>
                <td><?php echo $data[1]{$j}; ?></td>
                <td><?php echo $data[2]{$j}; ?></td>
            </tr>
        <?php }}; ?>
</table>
</br>
<table>
    <tr class="title">
        <td>City</td>
        <td>State</td>
        <td>Population</td>
    </tr>
    <?php for ($i=0,$numData2 = count($data2); $i<$numData2; $i++) { ?>
            <tr>
                <td><?php echo $data2[$i][0]; ?>
                <td><?php echo $data2[$i][1]; ?>
                <td><?php echo $data2[$i][2]; ?>
            </tr>
        <?php }; ?>
</table>
<br>
<table>
    <tr class="title">
        <td>City</td>
        <td>State</td>
        <td>Population</td>
    </tr>
    <?php foreach ($data3 as $city => $cityData) {
            foreach($cityData as $state => $stateData){ ?>
           <tr>
               <td><?php echo $city; ?>
               <td><?php echo $stateData; ?>
          </tr>
    <?php }}; ?>
</table>
</body>
</html>