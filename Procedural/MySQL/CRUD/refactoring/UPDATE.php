<?php
require "functions.php";

    // ambil ID di URL
    $id = $_GET["id"];
    
    // query data siswa berdasarkan ID di URL
$siswa = query("SELECT * FROM siswa_rpl WHERE id = $id")[0];
    // [0] adalah saat kita panggil function query() begitu dimasukkan kedalam array $rows yang kita ambil adalah index pertamanya

    if(isset($_POST["submit"])) {
        // cek apakah data berhasil atau tidak
        if(update($_POST) > 0){
            echo "<script>
            alert('Data berhasil di Ubah!');
            document.location.href = 'READ.php';
            </script>";
            // redirect versi JS
        }else{
            echo "Data gagal di Ubah" . "<br>" . mysqli_error($db);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
</head>

<body>
    <p>Ubah data siswa_RPL</p>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
            <input type="hidden" name="oldImage" value="<?= $siswa['gambar'] ?>">
            <!-- kekurangan, input yang disembunyikan dan bisa di injeksi, gunakan cara biasa namun logic-nya ada bebrapa yang tidak dipisah-->
            <li>
                <label for="nama">Nama : </label><br>
                <input type="text" name="nama" id="nama" required value="<?= $siswa['nama'] ?>">
            </li>
            <li>
                <label for="nis">NIS : </label><br>
                <input type="number" name="nis" id="nis" maxlength="8"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    required value="<?= $siswa['nis'] ?>">
            </li>
            <li>
                <label for="email">Email : </label><br>
                <input type="email" name="email" id="email" required value="<?= $siswa['email'] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label><br>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $siswa['jurusan'] ?>">
            </li>
            <li>
                <!-- UPLOAD -->

                <label for="gambar">Gambar : </label><br>
                <img src="../../../assets/TEMP/<?= $siswa['gambar'] ?>" alt="gambar user" width="50" height="50"><br>
                <!-- menampilkan gambar user dan diambil dari query-->
                <input type="file" name="gambar" id="gambar">
            </li>
            <li style="margin: 5px 0;">
                <button type="submit" name="submit">Send</button>
            </li>
        </ul>
    </form>
</body>

</html>