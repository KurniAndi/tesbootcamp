<!DOCTYPE html>
<html>
<?php
session_start();

if (!isset($_SESSION["name"])) {
    echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
    exit;
}

$id_pengguna = $_SESSION["id"];
$username = $_SESSION["name"];
$image = $_SESSION["image"];
$email = $_SESSION["email"];



?>

<head>
    <title>Update Article</title>

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

        if (isset($_GET['id'])) {
            $id = input($_GET["id"]);

            $sql = "select * from article where id=$id";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = htmlspecialchars($_POST["id"]);
            $title = input($_POST["title"]);
            $content = input($_POST["content"]);
            $image = input($_POST["image"]);
            $created_at = input($_POST["created_at"]);
            $id_user = input($_POST["id_author"]);
            $id_category = input($_POST["id_category"]);


            $sql = "update article set
			title='$title',
			content='$content',
			image='$image',
			created_at='$created_at',
			id_author='$id_author',
            id_category='$id_category'
			where id=$id";


            $hasil = mysqli_query($kon, $sql);


            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>" required />

            </div>
            <div class="form-group">
                <label>Content:</label>
                <input type="text" name="content" class="form-control" value="<?php echo $data['content']; ?>" required />

            </div>
            <div class="form-group">
                <label>Image:</label>
                <input type="text" name="image" class="form-control" value="<?php echo $data['image']; ?>" required />

            </div>
            <div class="form-group">
                <label>Created:</label>
                <input type="text" name="created_at" class="form-control" value="<?php echo $data['created_at']; ?>" required />
            </div>
            <div class="form-group">
                <label>User:</label>
                <input type="text" name="id_author" class="form-control" value="<?php echo $data['id_user']; ?>" required />
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="id_category" class="form-control" value="<?php echo $data['id_category']; ?>" required />
            </div>

            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning" role="button">Kembali</a>
        </form>
    </div>
</body>

</html>