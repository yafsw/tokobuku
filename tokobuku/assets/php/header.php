<div class="left">
    <a href="index.php" id="semua">Semua Buku</a>
    <a href="fiksi.php" id="fiksi">Buku Fiksi</a>
    <a href="nonfiksi.php" id="nonfiksi">Buku Non Fiksi</a>
    <a href="pelajaran.php" id="pelajaran">Buku Pelajaran</a>
</div>

<div class="right">
    <?php
        session_start();

        if (isset($_SESSION["id"])) {
            require("assets/php/koneksi.php");

            $idHeader      = $_SESSION["id"];
            $sqlIdHeader   = "select * from users where id = '$idHeader'";
            $queryIdHeader = mysqli_query($koneksi, $sqlIdHeader);
            $arrayIdHeader = mysqli_fetch_array($queryIdHeader);

            if ($_SESSION["id"] == 1) {
    ?>
                <a href="userlist.php" id="userlist">Userlist</a>

                <a href="administrator.php" id="administrator">Administrator</a>
                <a href="assets/php/keluar.php">Keluar</a>

                <div class="img">
                    <img src="assets/img/admin.png" alt="foto">
                </div>
    <?php
            } else {
    ?>
                <a href="keranjang.php" id="keranjang">Keranjang</a>

                <a href="edit-user.php?id=<?= $arrayIdHeader['id']; ?>" id="edit-user"><?= $arrayIdHeader["user"]; ?></a>
                <a href="assets/php/keluar.php">Keluar</a>

                <div class="img">
                    <img src="assets/img/<?= $arrayIdHeader['foto']; ?>" alt="foto">
                </div>
    <?php
            }
        } else {
    ?>
            <a href="masuk.php" id="masuk">Masuk</a>
            <a href="daftar.php" id="daftar">Daftar</a>
    <?php
        }
    ?>
</div>