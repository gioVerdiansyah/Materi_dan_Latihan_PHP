<?php
session_start();
// mulai session dan cek apakah variabel $_SESSION["login"] sudah ada atau tidak?
if (!isset($_SESSION["login"])) {
    header("Location: Login.php");
    exit;
}
require 'functions.php';


$siswa = query(
    "SELECT * FROM siswa_rpl ORDER BY id DESC LIMIT $awalData,$jumlahDataPerHalaman"
);

if (isset($_POST["submit"])) {
    $siswa = searching($_POST["search"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../../assets/favicomatic/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="../../assets/favicomatic/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/favicomatic/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="../../assets/favicomatic/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="../../assets/favicomatic/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../../assets/favicomatic/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="../../assets/favicomatic/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="../../assets/favicomatic/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        tr td {
            text-align: center;
        }

        .parent {
            display: flex;
            flex-direction: column;
        }

        .kelompok {
            width: 100%;
            margin: 5px 0;
            display: flex;
            flex-direction: row;
            align-items: center;
            align-self: flex-start;
            justify-content: space-between;
        }

        .col-1 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .col-2 a .add-data,
        .col-2 a .cetak {
            margin-right: 15px;
        }

        .add-data a,
        .col-2 .logout {
            text-decoration: none;
        }

        h1 {
            display: flex;
            justify-self: flex-start;
            align-self: flex-start;
        }

        #load {
            margin-left: 5px;
            display: none;
        }
    </style>
</head>

<body>


    <div class="parent">
        <div class="kelompok">
            <div class="col-1">
                <form action="" method="post">
                    <input type="search" name="search" id="search" placeholder="Search Data..." autocomplete="off"
                        autofocus required>
                    <button type="submit" id="cari" name="submit">Search</button>
                </form>
                <!-- loading gif -->
                <img src="../../assets/Rolling-0.4s-21px.gif" alt="loading" id="load">
            </div>
            <div class="col-2">
                <a href="INSERT.php"><button class="add-data"> Add Data </button></a>
                <a href="print.php" target="_blank"><button class="cetak"> Print! </button></a>
                <a href="logout.php" class="logout" onclick="return confirm('Sure?');"><button>Log Out</button></a>
            </div>
        </div>
        <div id="table-container">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th colspan="7">Daftar siswa_RPL</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Gambar</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                </tr>

                <?php
                $iD = 1;
                foreach ($siswa as $row):
                    ?>
                    <tr>
                        <td><?= $iD ?></td>
                        <td>
                            <a href="UPDATE.php?id=<?= $row['id'] ?>">Edit</a><br>
                            <a href="DELETE.php?id=<?= $row['id'] ?>" onclick="return confirm('Sure?');">Delete</a>
                        </td>
                        <td><img src="../../assets/TEMP/<?= $row['gambar'] ?>" alt="Photo Profile" width="50" height="50">
                        </td>
                        <td>
                            <?= $row["nis"] ?>
                        </td>
                        <td><?= $row["nama"] ?></td>
                        <td>
                            <?= $row["email"] ?>
                        </td>
                        <td><?= $row["jurusan"] ?></td>
                    </tr>
                    <?php
                    $iD++;
                endforeach
                ?>
            </table>
        </div>
        <!-- Navigasi PAGINATION -->
        <?php if (!isset($_POST["submit"])): ?>
            <!-- hilangkan saat tombol search ditekan -->
            <div id="pagination" class="col-1" style="margin:5px">
                <!-- fitur arrow -->
                <?php if ($halamanAktif > 1): ?>
                    <a href="?page=<?= $halamanAktif - 1 ?>">&laquo;</a>
                    <?php endif ?>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>

                    <!-- membuat user tahu bahwa sedang aktif di halaman berapa dengan menggunakan tanda bold di anchornya -->
                    <?php if ($i == $halamanAktif): ?>
                        <a href="?page=<?= $i ?>" style="margin:0 5px;font-weight:bold;color:green;">
                            <?= $i ?>
                        </a>
                        <?php else: ?>
                        <a href="?page=<?= $i ?>" style="margin:0 5px">
                            <?= $i ?>
                        </a>
                        <?php endif ?>

                    <?php endfor ?>

                <!-- fitur arrow -->
                <?php if ($halamanAktif < $jumlahHalaman): ?>
                    <a href="?page=<?= $halamanAktif + 1 ?>">&raquo;</a>
                    <?php endif ?>

                <?php endif ?>
        </div>
    </div>
    <script src="AJAX/jquery-3.6.3.min.js"></script>
    <script src="AJAX/ajax-query.js"></script>
</body>

</html>