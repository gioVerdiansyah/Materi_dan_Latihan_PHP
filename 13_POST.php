<!-- Jika GET tadi datanya dikirim lewat URL tapi jika POST datanya dikirim lewat form tetapi jika menggunakan GET juga tetap bisa tapi jika URL hanya bisa menggunakan GET
-->

<!-- kelebihannya adalah jika menggunakan POST maka data yang dikirimkan lewat form tidak akan kelihatan -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>

<body>
    <!-- menggunakan POST -->
    <form action="14_from_POST.php" method="post">
        Masukkan nama: <br>
        <input type="text" name="nama_post">
        <br>
        <button type="submit" name="submit">Send</button>
    </form>

    <!-- didalam form harus ada input dan submit untuk mengirimkan, dan action untuk tempat penampungan,method adalah metode yang digunakan dalam form,name adalah nama dari input ynag nantinya berfungsi sebagai key dari isi nilai itu tersebut -->


    <!-- maka setelah user menekan tombol submit maka akan menuju ke halaman yang ada di action -->


    <!-- menggunakan GET -->
    <!-- <form action="14_from_POST.php" method="get">
        Masukkan nama: <br>
        <input type="text" name="nama_get">
        <br>
        <button type="submit" name="submit">Send</button>
    </form> -->
    <!-- namun sekarang datanya terlihat di URL:( -->
    <!-- NOTE tidak bisa menggunakan 2 method sekaligus karena tombol submitnya juga ada 2 -->
</body>

</html>