<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>

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
                        <table class="user">
                            <tr>
                                <th>Foto</th>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>

                            <?php
                                require_once('assets/php/koneksi.php');

                                $sqlSemua     = "select * from users";
                                $querySemua   = mysqli_query($koneksi, $sqlSemua);

                                while ($semua = mysqli_fetch_array($querySemua)) {
                            ?>
                                    <tr>
                                        <td><div><img src="assets/img/<?= $semua["foto"]; ?>" alt="Foto"></div></td>
                                        <td><?= $semua["id"]; ?></td>
                                        <td><?= $semua["user"]; ?></td>
                                        <td><?= $semua["pass"]; ?></td>
                                        <td><a href="edit-user.php?id=<?= $semua['id']; ?>">Edit</a> | <a href="assets/php/hapus-user.php?id=<?= $semua['id']; ?>">Hapus</a></td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </table>

                        <a href="tambah-user.php" class="tambah">Tambah User</a>
                    </div>
                </div>
            </div>
        </main>

        <script>
            document.getElementById('userlist').style.backgroundColor = 'rgba(66, 72, 116, .9)';
        </script>
    </body>

</html>