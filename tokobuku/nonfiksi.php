<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buku Non Fiksi</title>

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
                <div class="nonfiksi">
                    <?php
                        require_once('assets/php/koneksi.php');

                        $sqlNonFiksi     = "select * from buku where jenis = 'nonfiksi'";
                        $queryNonFiksi   = mysqli_query($koneksi, $sqlNonFiksi);

                        while ($NonFiksi = mysqli_fetch_array($queryNonFiksi)) {
                    ?>
                            <div class="card">
                                <div class="gambar">
                                    <img src="assets/img/<?= $NonFiksi['kover'] ?>" alt="Kover">
                                </div>

                                <div class="teks">
                                    <h5>BOOK<?= $NonFiksi["kode"] ?></h5>

                                    <div class="judul">
                                        <h3><?= $NonFiksi["judul"] ?></h3>
                                        <p><?= $NonFiksi["pengarang"] ?></p>
                                    </div>

                                    <h4>Rp.<?= $NonFiksi["harga"] ?></h4>
                                </div>

                                <a href="assets/php/beli.php?kode=<?= $NonFiksi["kode"] ?>">Beli</a>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('nonfiksi').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>