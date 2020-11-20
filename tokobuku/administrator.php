<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrator</title>

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
                <div class="administrator">
                    <div class="card">
                        <table>
                            <tr>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>

                            <?php
                                require_once('assets/php/koneksi.php');

                                $sqlSemua     = "select * from buku";
                                $querySemua   = mysqli_query($koneksi, $sqlSemua);

                                while ($semua = mysqli_fetch_array($querySemua)) {
                            ?>
                                    <tr>
                                        <td>BOOK<?= $semua["kode"]; ?></td>
                                        <td><?= $semua["jenis"]; ?></td>
                                        <td><?= $semua["judul"]; ?></td>
                                        <td><?= $semua["pengarang"]; ?></td>
                                        <td><?= $semua["harga"]; ?></td>
                                        <td><a href="edit-buku.php?kode=<?= $semua["kode"]; ?>">Edit</a> | <a href="assets/php/hapus-buku.php?kode=<?= $semua["kode"]; ?>">Hapus</a></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </table>
                        <a href="tambah-buku.php" class="tambah">Tambah Buku</a>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('adninistrator').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>