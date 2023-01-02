<!-- file ini akan mengirim kedalam script.js dan akan dikelola oleh responseText dalam if -->

<?php
require "../functions.php";

// sleep(1);jika ingin loading nya ada jeda 1 detik
usleep(300000); // 300 milisecond

// menangkap keyword dalam field input
$keyword = $_GET["key"];

$siswa = query(
    "SELECT * FROM siswa_rpl 
        WHERE
            nama LIKE '%$keyword%' OR
            nis LIKE '$keyword%'
    ORDER BY id DESC"
);


?>
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
        <td><?= $row["nis"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>
    </tr>
    <?php
        $iD++;
    endforeach
    ?>
</table>