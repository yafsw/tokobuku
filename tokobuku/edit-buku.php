<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Buku</title>

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
                if (isset($_GET["kode"])) {
                    $kode = $_GET["kode"];
    
                    require_once("assets/php/koneksi.php");
    
                    $sqlBuku   = "select * from buku where kode = '$kode'";
                    $queryBuku = mysqli_query($koneksi, $sqlBuku);
                    $buku      = mysqli_fetch_array($queryBuku);
                }
            ?>

            <div class="main">
                <div class="edit-buku">
                    <div class="card">
                        <h2>Edit Buku</h2>

                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode" id="kode" value="<?= $buku["kode"] ?>">
                            <input type="text" name="jenis" id="jenis" value="<?= $buku["jenis"] ?>">
                            <input type="text" name="judul" id="judul" value="<?= $buku["judul"] ?>">
                            <input type="text" name="pengarang" id="pengarang" value="<?= $buku["pengarang"] ?>">
                            <input type="text" name="harga" id="harga" value="<?= $buku["harga"] ?>">
                            <input type="file" name="kover">

                            <input type="submit" name="edit-buku" id="edit-buku" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>

<?php
    if (isset($_POST['edit-buku'])) {
        $kodeEdit       = $_POST['kode'];
        $jenisEdit      = $_POST['jenis'];
        $judulEdit      = $_POST['judul'];
        $pengarangEdit  = $_POST['pengarang'];
        $hargaEdit      = $_POST['harga'];

        $fileName   = $_FILES['kover']['name'];
        $tmpName   = $_FILES['kover']['tmp_name'];
        $dirUpload  = "assets/img/";
        $terUpload  = move_uploaded_file($tmpName, $dirUpload.$fileName);

        if ($fileName == "") {
            $update = mysqli_query($koneksi, "update buku set jenis = '$jenisEdit', judul = '$judulEdit', pengarang = '$pengarangEdit', harga = '$hargaEdit' where kode = '$kodeEdit'");
        } else {
            $update = mysqli_query($koneksi, "update buku set jenis = '$jenisEdit', judul = '$judulEdit', pengarang = '$pengarangEdit', harga = '$hargaEdit', kover = '$fileName' where kode = '$kodeEdit'");
        }

        header('location: administrator.php');
    }
?>