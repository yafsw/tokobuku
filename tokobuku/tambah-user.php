<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah User</title>

        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <header>
            <div class="header">
                <?php
                    include("assets/php/header.php");
                ?>
            </div>
        </header>

        <main>
            <div class="main">
                <div class="tambah-buku">
                    <div class="card">
                        <h2>Tambah User</h2>

                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="text" name="user" id="user" placeholder="Username" required>
                            <input type="password" name="pass" id="pass" placeholder="Password" required>
                            <input type="file" name="foto">

                            <input type="submit" name="tambah-user" id="tambah-user" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>

<?php
    require("assets/php/koneksi.php");

    if (isset($_POST["tambah-user"])) {
        $username  = $_POST["user"];
        $password  = $_POST["pass"];

        $fileName  = $_FILES['foto']['name'];
        $tmpName   = $_FILES['foto']['tmp_name'];
        $dirUpload = "assets/img/";
        $terUpload = move_uploaded_file($tmpName, $dirUpload . $fileName);

        $sqlUser   = "select * from users where user = '$username'";
        $queryUser = mysqli_query($koneksi, $sqlUser);

        if (mysqli_num_rows($queryUser) == 1) {
            echo "
                <script>
                    alert('Username telah tersedia!');
                    history.back();
                </script>
                ";
        } else {
            $sqlAdd     = "insert into users (user, pass, foto) value ('$username', '$password', '$fileName')";
            $queryAdd   = mysqli_query($koneksi, $sqlAdd);

            header('location: userlist.php');
        }
    }
?>