<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Keranjang</title>

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
                <div class="userlist">
                    <div class="card">
                        <table class="Keranjang">
                            <tr>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>

                            <?php
                                require_once('assets/php/koneksi.php');

                                $id = $_SESSION["id"];

                                $sqlSemua     = "select * from keranjang where id = '$id'";
                                $querySemua   = mysqli_query($koneksi, $sqlSemua);

                                $total        = 0;

                                while ($semua = mysqli_fetch_array($querySemua)) {
                                    $total   += $semua["harga"];
                            ?>
                                    <tr>
                                        <td>BOOK<?= $semua["kode"]; ?></td>
                                        <td><?= $semua["judul"]; ?></td>
                                        <td><?= $semua["pengarang"]; ?></td>
                                        <td>Rp.<?= $semua["harga"]; ?></td>
                                        <td><a href="assets/php/hapus-pesanan.php?kode=<?= $semua['kode']; ?>">Hapus</a></td>
                                    </tr>
                            <?php
                                }
                            ?>

                            <tr class="total">
                                <td></td>
                                <td></td>
                                <td>Total yang harus dibayar:</td>
                                <td>Rp.<?php echo $total; ?></td>
                                <td></td>
                            </tr>
                        </table>

                        <a href="" class="checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('keranjang').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>