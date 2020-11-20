<?php
    if (isset($_GET["kode"])) {
        $kode = $_GET["kode"];

        require_once("koneksi.php");

        $sqlHapus   = "delete from buku where kode = '$kode'";
        $queryHapus = mysqli_query($koneksi, $sqlHapus);

        echo "
            <script>
                alert('Buku berhasil dihapus!');
                history.back();
            </script>
        ";
    }
?>