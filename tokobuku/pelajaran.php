<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buku Pelajaran</title>

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
                <div class="pelajaran">
                    <?php
                        require_once('assets/php/koneksi.php');

                        $sqlPelajaran     = "select * from buku where jenis = 'pelajaran'";
                        $queryPelajaran   = mysqli_query($koneksi, $sqlPelajaran);

                        while ($pelajaran = mysqli_fetch_array($queryPelajaran)) {
                    ?>
                            <div class="card">
                                <div class="gambar">
                                    <img src="assets/img/<?= $pelajaran['kover'] ?>" alt="Kover">
                                </div>

                                <div class="teks">
                                    <h5>BOOK<?= $pelajaran["kode"] ?></h5>

                                    <div class="judul">
                                        <h3><?= $pelajaran["judul"] ?></h3>
                                        <p><?= $pelajaran["pengarang"] ?></p>
                                    </div>

                                    <h4>Rp.<?= $pelajaran["harga"] ?></h4>
                                </div>

                                <a href="assets/php/beli.php?kode=<?= $pelajaran["kode"] ?>">Beli</a>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('pelajaran').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>