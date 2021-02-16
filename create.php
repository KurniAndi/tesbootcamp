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
    <title>Form Pengisian Article</title>

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

            $title = input($_POST["title"]);
            $content = input($_POST["content"]);
            $image = input($_POST["image"]);
            $created_at = input($_POST["created_at"]);
            $id_author = input($_SESSION["id"]);
            $id_category = input($_SESSION["id"]);





            $sql = "insert into article (title,content,image,created_at,id_author,id_category) values
		('$title','$content','$image','$created_at','$id_author','$id_category')";


            $hasil = mysqli_query($kon, $sql);


            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }

        ?>
        <h2>Form Pengisian Data Article</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Content:</label>
                <input type="text" name="content" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Image:</label>
                <input type="text" name="image" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Created:</label>
                <input type="date" name="created_at" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="hidden" name="id_author" class="form-control" required />
                <input type="hidden" name="id_category" class="form-control" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning" role="button">Kembali</a>
        </form>
    </div>
</body>

</html>