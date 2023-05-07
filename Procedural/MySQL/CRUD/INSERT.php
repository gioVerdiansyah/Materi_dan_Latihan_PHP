<?php
// koneksi ke DBMS
$db = mysqli_connect(
    "localhost",
    "root",
    "",
    "latihandasar"
    );

// cek apakah tombol submit sudah di tekan atau belum
    if(isset($_POST["submit"])) {
    // jika TRUE maka ambil data yang ada di form lalu masukkan ke dalam DB

    // ambil data dari tiap elemen form
        $nama = $_POST["nama"];
        $nis = $_POST["nis"];
        $email = $_POST["email"];
        $jurusan = $_POST["jurusan"];
        $gambar = $_POST["gambar"];
    

    // query insert data
    $query = "INSERT INTO siswa_rpl VALUES ('','$nama','$nis','$email','$jurusan','$gambar')";
    mysqli_query($db, $query);
    

    // cek apakah data berhasil di tambahkan atau tidak
    mysqli_affected_rows($db);
    // ini adalah fungsi yang menghasilkan sebuah angka dalam baris yang nambah, berubah, dan terhapus, jika nambah dan hapus nilainya 1 jika error maka -1

    // lalu untuk mengeceknya:
    if(mysqli_affected_rows($db) > 0){
    // jika lebih besar dari 0 pasri ada yang berubah
        echo "Data berhasil di tambahkan";
    }else{
        echo "Data gagal di tambahkan" . "<br>" . mysqli_error($db);
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add data</title>
</head>

<body>
    <p>Tambah data siswa_RPL</p>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label><br>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nis">NIS : </label><br>
                <input type="number" name="nis" id="nis" maxlength="8"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    required>
            </li>
            <li>
                <label for="email">Email : </label><br>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label><br>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label><br>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Send</button>
                <!-- name submit ini akan menjadi key di variabel $_POST -->
            </li>
        </ul>
    </form>
</body>

</html>