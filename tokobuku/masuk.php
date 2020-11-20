<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Masuk</title>

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
                <div class="masuk">
                    <div class="card">
                        <h2>Masuk</h2>

                        <form action="#" method="POST">
                            <input type="text" name="user" id="user" placeholder="Username" required>
                            <input type="password" name="pass" id="pass" placeholder="Password" required>

                            <input type="submit" name="masuk" id="masuk" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('masuk').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>

<?php
    require("assets/php/koneksi.php");

    if (isset($_POST["masuk"])) {
        $username  = $_POST["user"];
        $password  = $_POST["pass"];

        $sqlUser   = "select * from users where user = '$username'";
        $queryUser = mysqli_query($koneksi, $sqlUser);

        if (mysqli_num_rows($queryUser) == 1) {
            $user  = mysqli_fetch_array($queryUser);

            if ($password == $user["pass"]) {
                session_start();
                $_SESSION["id"] = $user["id"];

                header("location: index.php");
            } else {
                echo "
                    <script>
                        alert('Password salah!');
                        history.back();
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Akun tidak ditemukan!');
                    history.back();
                </script>
            ";
        }
    }
?>