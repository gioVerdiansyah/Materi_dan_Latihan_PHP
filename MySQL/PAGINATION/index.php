<?php
require 'functions.php';


$siswa = query(
    "SELECT * FROM siswa_rpl LIMIT $awalData,$jumlahDataPerHalaman"
);
if (isset($_POST["submit"])) {
    $siswa = search($_POST["search"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <style>
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
        }

        .add-data {
            margin-left: 15px;
        }

        .add-data a,
        .col-2 .logout {
            color: white;
            text-decoration: none;
        }

        h1 {
            display: flex;
            justify-self: flex-start;
            align-self: flex-start;
        }
    </style>

    <h1>READ</h1>

    <div class="parent">
        <div class="kelompok">
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="Search Data..." autocomplete="off" autofocus
                    required>
                <button type="submit" name="submit">Search</button>
            </form>
            <a href="INSERT.php"><button class="add-data"> Add Data </button></a>
            <!-- menuju ke form INSERT untuk menambah data --->
        </div>
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
                    <td><img src="../../assets/TEMP/<?= $row['gambar'] ?>" alt="Photo Profile" width="50" height="50"></td>
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
        <!-- Navigasi PAGINATION -->
        <?php if (!isset($_POST["submit"])): ?>
            <!-- hilangkan saat tombol search ditekan -->
            <div class="col-1" style="margin:5px">
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
</body>

</html>