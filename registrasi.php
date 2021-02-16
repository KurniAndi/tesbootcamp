<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
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

            $id = input($_POST["id"]);
            $name = input($_POST["name"]);
            $email = input($_POST["email"]);
            $password = input($_POST["password"]);
            $image = input($_POST["image"]);


            $sql = "insert into author (id,name,email,password,image) values
		('$id','$name','$email','$password','$image')";




            $hasil = mysqli_query($kon, $sql);


            if ($hasil) {
                header("Location:login.php");
            } else {
                echo "<div class='alert alert-danger'> Registrasi Gagal.</div>";
            }
        }
        ?>
        <h2>Registrasi</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required />

            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="image" class="form-control" required />

            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</body>

</html>