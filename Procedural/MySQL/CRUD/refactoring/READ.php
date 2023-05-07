<?php
// agar kita tidak menulis ulang ulang saat berpindah atau membuat file baru maka koneksinya juga harus kita buat satu satu
// lalu untuk menghubungkannya kita menggunakan syntax require lali string dengan nama filenya

require 'functions.php';

// setelah membuat function yang menampung isi query kedalam wadah array dengan looping kita panggil dan tampung kedalam variabel (bebas)

$siswa = query("SELECT * FROM siswa_rpl ORDER BY id DESC");

// setelah menggunakan ini maka kita tidak menggunakan while lagi


// SEARCHING
// tombol cari ditekan, maka kita akan timpa query-nya sesuai value dari pencariannya
if (isset($_POST["submit"])) {
    $siswa = search($_POST["search"]);
    // jadi nanti $result ini akan berisi data dari function search, lalu function search ini akan mendapatkan apapun yang diketikan dari usernya
}
?>


<!-- 
    sekarang kita tidak akan menggunakan while karena analoginya jika kita meminta ke-temen kita untuk mengambilkan bajunya ke rumah kita tapi temen kita membawa sekaligus lemarinya lalu dibukakan dan diambilkan bajunya, ambil satu kasih lihat dan sampai habis
-->
<!--
    Analogi yang akan kita buat adalah temen kita menyimpan dulu bajunya kedalam sebuah wadah lalu di bawa ke kita dengan keadaan rapi
--->


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
            align-items: center;
            align-self: flex-start;
            justify-content: space-between;
        }

        .add-data a {
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
                    <td><img src="../../../assets/TEMP/<?= $row['gambar'] ?>" alt="Photo Profile" width="50" height="50">
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
</body>

</html>