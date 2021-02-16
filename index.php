<!DOCTYPE html>
<html lang="en">

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Article</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h4>Data Article</h4>
        <?php

        include "koneksi.php";


        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET["id"]);

            $sql = "delete from article where id='$id' ";
            $hasil = mysqli_query($kon, $sql);


            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>
        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>User</th>
                    <th>Category</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <?php
            include "koneksi.php";
            $sql = "select * from article where id_author = $id ";
            $sql_user = "select * from article join author on author.id = article.id_author";
            $sql_category = "select * from category join author on author.id = category.id";
            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["title"]; ?></td>
                        <td><?php echo $data["content"];   ?></td>
                        <td><?php echo $data["image"];   ?></td>
                        <td><?php echo $data["created_at"];   ?></td>
                        <td><?php echo $data["id_author"];   ?></td>
                        <td><?php echo $data["id_category"];   ?></td>
                        <td>
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Article</a>
        <a href="create_category.php" class="btn btn-primary" role="button">Tambah Category</a>
        <a href="logout.php" class="btn btn-warning" role="button">Logout</a>

    </div>
</body>

</html>