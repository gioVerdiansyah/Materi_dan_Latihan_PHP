<!-- ada satu keanehan yaitu jika kita langsung menulis alamat URL tanpa mengirim data maka isi dari li-nya akan undifined karena di variabel GET kosong

lalu gimana cara mengatasinya>?
Caranya adalah membuat user tidak boleh mengetik langsung URL-nya
-->

<!-- dengan cara mengecek variabel GET-nya dengan if lalu isset untuk mengeceknya-->
<?php
    if (!isset($_GET["nama"]) || !isset($_GET["nis"]) || !isset($_GET["ahli"]) || !isset($_GET["email"]) || !isset($_GET["photo_profile"])) {
        // kita menggunakan method redirect untuk memindahkan paksa user ke halaman tertentu, untuk melakukan itu kita menggunakan function header()
        // kita tulis semua nama key-nya agar tidak bisa di bodohi jika user hanya memasukkan beberapa key saja

    header("Location: 11_GET.php");
    exit;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail siswa</title>
</head>
<!-- kita bisa aja menampilkan data mahasiswa disini, namun masalahnya adalah, jika kita mengklik nama yang lain mana yang muncul juga data ini -->

<!-- nah caranya adalah menggunakan GET 
dengan mengirimkan datanya kesini dengan metode request GET (URL) line 73 anchor
-->

<body>
    <ul>
        <li>
            <img src="assets/<?= $_GET["photo_profile"] ?>" alt="foto siswa" style="width: 40px; height: 40px" />
        </li>
        <li><?= $_GET["nama"] ?></li>
        <!-- kita sudah mendapatkan data namanya dari URL namun yang lain masih sama, dan kita harus mengirimkan datanya satu satu--->
        <li><?= $_GET["nis"] ?></li>
        <li><?= $_GET["ahli"] ?></li>
        <li><?= $_GET["email"] ?></li>
    </ul>
    <a href="11_GET.php">Back</a>
</body>

</html>
<!-- kenapa tetap bisa memanggil nama,nis dll tanpa memanggil key dari array sebelumnya?
karena kita sudah memasukkan nama keynya di anchor dan otomatis valuenya berpindah langsung di $_GET dan kita hanya perlu memanggil key-nya saja
-->