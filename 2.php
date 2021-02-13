<?php
$array = array(0, 1, 2, 4, 6, 5, 3);
print_r($array);
$c = count($array);
sort($array);
echo "<br>cekMedian:";
print_r($array);
$d = $c / 2;
if (gettype($d) == 'double') {
    $d = floor($d);
    $med = $array[$d];
} else {
    $d = floor($d);
    $d1 = round($d);
    $med = ($array[$d] + $array[$d1]) / 2;
}
echo "<br>Result: Median dari array tersebut adalah  $med <br><br>";
