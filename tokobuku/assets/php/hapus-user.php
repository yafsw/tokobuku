<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        require_once("koneksi.php");

        $sqlHapus   = "delete from users where id = '$id'";
        $queryHapus = mysqli_query($koneksi, $sqlHapus);

        echo "
            <script>
                alert('Akun berhasil dihapus!');
                history.back();
            </script>
        ";
    }
?>