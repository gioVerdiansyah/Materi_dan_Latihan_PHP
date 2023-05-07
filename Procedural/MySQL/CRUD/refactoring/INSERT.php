<?php
require "functions.php";

    if(isset($_POST["submit"])) {
        // var_dump($_POST);// dibagian gambar kita melihat bahwa isinya sesuai dengan nama file yang kita masukkan,

        // namun setelah menulis enctype="multipart/form-data" gambar tadi sudah tidak dikelola oleh POST melainkan FILES
        // var_dump($_FILES);
        // die;//hentikan program dibawah ini

        // cek apakah data berhasil atau tidak
        if(add($_POST) > 0){
            echo "<script>
            alert('Data berhasil di tambahkan!');
            document.location.href = 'READ.php';
            </script>";
            // redirect versi JS
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

    <form action="" method="post" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" ini agar dapat mengelola file, jadi sekarang form meliliki 2 jalur yitu $_POST dan $_FILES-->
        <ul style="list-style-type: none;">
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
                <!-- UPLOAD -->
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li style="margin: 5px 0;">
                <button type="submit" name="submit">Send</button>
            </li>
        </ul>
    </form>
</body>

</html>