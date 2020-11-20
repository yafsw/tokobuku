<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buku Fiksi</title>

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
                <div class="fiksi">
                    <?php
                        require_once('assets/php/koneksi.php');

                        $sqlFiksi     = "select * from buku where jenis = 'fiksi'";
                        $queryFiksi   = mysqli_query($koneksi, $sqlFiksi);

                        while ($fiksi = mysqli_fetch_array($queryFiksi)) {
                    ?>
                            <div class="card">
                                <div class="gambar">
                                    <img src="assets/img/<?= $fiksi['kover'] ?>" alt="Kover">
                                </div>

                                <div class="teks">
                                    <h5>BOOK<?= $fiksi["kode"] ?></h5>

                                    <div class="judul">
                                        <h3><?= $fiksi["judul"] ?></h3>
                                        <p><?= $fiksi["pengarang"] ?></p>
                                    </div>

                                    <h4>Rp.<?= $fiksi["harga"] ?></h4>
                                </div>

                                <a href="assets/php/beli.php?kode=<?= $fiksi["kode"] ?>">Beli</a>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('fiksi').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>