<!-- nah bagaimana jika actionnya kosong? -->
<!-- maka datanya akan dikirim di halaman itu sendiri  -->

<!-- bahkan jika tidak menuliskan actionnya maka PHP akan berasumsi jika datanya akan dikirim ke halaman itu sendiri-->

<!-- bahkan jika tanpa menuliskan methodnya maka secara default nilainya adalah GET -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>without post method and action</title>
</head>
<!-- kita juga bisa memanggilnya langsung, manun error karena kita berusaha mencetak nilai yang belum diisi, maka: -->

<body>
    <?php
        if(isset($_POST["submit"])) :
        // lebih menggunakan submit karena kita mengecek apakah tombol sumbit sudah pernah di pencet atau belum
    ?>
    <!-- jika tombol submit sudah pernah di pencet maka tampilkan ini -->
    <p>Selamat datang, <?= $_POST["nama"] ?></p>
    <?php endif ?>

    <form action="" method="post">
        Masukkan nama: <br>
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Send</button>
    </form>
</body>

</html>