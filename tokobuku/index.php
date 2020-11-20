<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Semua Buku</title>

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
                <div class="semua">
                    <?php
                        require_once('assets/php/koneksi.php');

                        $sqlSemua     = "select * from buku";
                        $querySemua   = mysqli_query($koneksi, $sqlSemua);

                        while ($semua = mysqli_fetch_array($querySemua)) {
                    ?>
                            <div class="card">
                                <div class="gambar">
                                    <img src="assets/img/<?= $semua['kover']; ?>" alt="Kover">
                                </div>

                                <div class="teks">
                                    <h5>BOOK<?= $semua["kode"]; ?></h5>

                                    <div class="judul">
                                        <h3><?= $semua["judul"]; ?></h3>
                                        <p><?= $semua["pengarang"]; ?></p>
                                    </div>

                                    <h4>Rp.<?= $semua["harga"]; ?></h4>
                                </div>

                                <a href="assets/php/beli.php?kode=<?= $semua['kode']; ?>">Beli</a>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('semua').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>