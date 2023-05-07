<?php
// jika user belum login
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: Login.php");
    exit;
}
require "functions.php";

if (isset($_POST["submit"])) {
    // cek apakah data berhasil atau tidak
    if (add($_POST) > 0) {
        echo "<script>
            alert('Data berhasil di tambahkan!');
            document.location.href = 'index.php';
            </script>";
    } else {
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
</head>

<body>
    <p>Tambah data siswa_RPL</p>

    <form action="" method="post" enctype="multipart/form-data">
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