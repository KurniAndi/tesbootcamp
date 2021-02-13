<?php
session_start();

include "koneksi.php";

$username = $_POST["name"];
$p = $_POST["password"];

$sql = "select * from author where name='" . $username . "' and password='" . $p . "' limit 1";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);


if ($jumlah > 0) {
    $row = mysqli_fetch_assoc($hasil);
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["image"] = $row["image"];
    $_SESSION["email"] = $row["email"];


    header("Location:index.php");
} else {
    echo "Username atau password salah <br><a href='login.php'>Kembali</a>";
}
