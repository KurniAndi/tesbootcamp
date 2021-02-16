<!DOCTYPE html>
<html>
<?php
session_start();

if (!isset($_SESSION["name"])) {
    echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
    exit;
}

$id = $_SESSION["id"];
$username = $_SESSION["name"];
$image = $_SESSION["image"];
$email = $_SESSION["email"];



?>

<head>
    <title>Form Pengisian Category</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <?php

        include "koneksi.php";


        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = input($_POST["name"]);



            $sql = "insert into category (name) values
		('$nama')";


            $hasil = mysqli_query($kon, $sql);


            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Form Pengisian Data Category</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required />

            </div>


            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning" role="button">Kembali</a>
        </form>
    </div>
</body>

</html>