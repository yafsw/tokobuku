<?php
    if (isset($_GET["kode"])) {
        session_start();

        if (isset($_SESSION["id"])) {
            if ($_SESSION["id"] == 1) {
                echo "
                    <script>
                        alert('Anda harus masuk sebagai user!');
                        history.back();
                    </script>
                ";
            } else {
                $kode = $_GET["kode"];
                $id   = $_SESSION["id"];

                require_once("koneksi.php");

                $sqlBuku    = "select * from buku where kode = $kode";
                $queryBuku  = mysqli_query($koneksi, $sqlBuku);
                $buku       = mysqli_fetch_array($queryBuku);
                $judul      = $buku["judul"];
                $pengarang  = $buku["pengarang"];
                $harga      = $buku["harga"];

                $sqlBeli    = "insert into keranjang (kode, judul, pengarang, harga, id) value ('$kode', '$judul', '$pengarang', '$harga', '$id')";
                $queryBeli  = mysqli_query($koneksi, $sqlBeli);

                header("location: ../../keranjang.php");
            }
        } else {
            echo "
                <script>
                    alert('Anda harus masuk terlebih dahulu!');
                    history.back();
                </script>
            ";
        }
    }
?>