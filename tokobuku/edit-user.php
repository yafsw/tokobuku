<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>

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
            <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
    
                    require_once("assets/php/koneksi.php");
    
                    $sqlUser   = "select * from users where id = '$id'";
                    $queryUser = mysqli_query($koneksi, $sqlUser);
                    $user      = mysqli_fetch_array($queryUser);
                }
            ?>

            <div class="main">
                <div class="edit-user">
                    <div class="card">
                        <h2>Edit User</h2>

                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $user["id"] ?>">
                            <input type="text" name="user" id="user" value="<?= $user["user"] ?>">
                            <input type="text" name="pass" id="pass" value="<?= $user["pass"] ?>">
                            <input type="file" name="foto">

                            <input type="submit" name="edit-user" id="edit-user" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('edit-user').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>

<?php
    if (isset($_POST['edit-user'])) {
        $idEdit     = $_POST['id'];
        $userEdit   = $_POST['user'];
        $passEdit   = $_POST['pass'];

        $fileName   = $_FILES['foto']['name'];
        $tmpName   = $_FILES['foto']['tmp_name'];
        $dirUpload  = "assets/img/";
        $terUpload  = move_uploaded_file($tmpName, $dirUpload.$fileName);

        if ($fileName == "") {
            $update = mysqli_query($koneksi, "update users set user = '$userEdit', pass = '$passEdit ' where id = '$idEdit'");
        } else {
            $update = mysqli_query($koneksi, "update users set user = '$userEdit', pass = '$passEdit ', foto = '$fileName' where id = '$idEdit'");
        }

        header('location: userlist.php');
    }
?>