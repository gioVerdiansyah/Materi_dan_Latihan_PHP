<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>output POST</title>
</head>
<!-- maka setelah user menekan tombol submit maka akan menuju ke halaman ini -->

<body>
    <p>Selamat datang, Admin</p><!-- nah bagaimana agar nama yang di masukkan user dari form muncul disini? --->

    <!-- caranya: -->
    <p>Selamat datang, <?= $_POST["nama_post"] ?></p>

    <!-- bisa juga menggunakan GET namun kita harus mengganti methodnya dan nama variabel yang ada disini -->
    <!-- <p>Selamat datang, <?//= $_GET["nama_get"] ?></p> -->
    <!-- NOTE tidak bisa menggunakan 2 method sekaligus karena tombol submitnya juga ada 2 -->

</body>

</html>