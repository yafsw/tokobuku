<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Buku</title>

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
                        <h2>Tambah Buku</h2>

                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="text" name="jenis" id="jenis" placeholder="Jenis" required>
                            <input type="text" name="judul" id="judul" placeholder="Judul" required>
                            <input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" required>
                            <input type="text" name="harga" id="harga" placeholder="Harga" required>
                            <input type="file" name="kover">

                            <input type="submit" name="tambah-buku" id="tambah-buku" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>

<?php
    require("assets/php/koneksi.php");

    if (isset($_POST["tambah-buku"])) {
        $jenis      = $_POST['jenis'];
        $judul      = $_POST['judul'];
        $pengarang  = $_POST['pengarang'];
        $harga      = $_POST['harga'];

        $fileName   = $_FILES['kover']['name'];
        $tmpName   = $_FILES['kover']['tmp_name'];
        $dirUpload  = "assets/img/";
        $terUpload  = move_uploaded_file($tmpName, $dirUpload.$fileName);

        $sqlBuku   = "select * from buku where judul = '$judul'";
        $queryBuku = mysqli_query($koneksi, $sqlBuku);

        if (mysqli_num_rows($queryBuku) == 1) {
            echo "
                <script>
                    alert('Buku telah tersedia!');
                    history.back();
                </script>
                ";
        } else {
            $sqlAdd     = "insert into buku (jenis, judul, pengarang, harga, kover) value ('$jenis', '$judul', '$pengarang', '$harga', '$fileName')";
            $queryAdd   = mysqli_query($koneksi, $sqlAdd);

            header('location: administrator.php');
        }
    }
?>