<?php

$pesan = " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
echo "Params : $pesan </br> </br>";
$pesanPerKata = explode(" ", $pesan);
$arr = '';
foreach ($pesanPerKata as $kata) {
    $arr .= substr($kata, 0, 1);
}
echo "Result : $arr";
