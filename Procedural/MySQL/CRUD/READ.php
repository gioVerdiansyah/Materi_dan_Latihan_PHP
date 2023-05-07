<?php
// koneksi ke databases
    $db = mysqli_connect(
        "localhost", //nama hostnya
        "root", //Username hostnya
        "", //Passwordnya
        "latihandasar" //Databasenya
        );

// Mengambil data dari tabel siswa / query data siswa
    $result = mysqli_query(
        $db,
        //koneksi ke DB-nya
        "SELECT * FROM siswa_rpl ORDER BY id ASC" //qerynya mau apa? menggunakan syntax SQL

        // meski berhasil / salah query tidak akan menampikan pesan kesalahan jika meski itu pun salah
        // cara mengatasinya adalah menyimpan ke dalam variabel $result
        // ketika kita melakukan query maka MySQL akan mengembalikan 2 hal:
            //  1.) jika berhasil akan mengembalikan nilai true dan akan menjalankan perintah query
            //  2.) jika gagal maka fungsi mysqli nya tidak akan dijalankan tapi mengembalikan nilai false
    );//mau ngambil data apa? dari tabel mana?
    // mengeceknya:
    // var_dump($result)
    // if(!$result){
    //     echo mysqli_error($conn);
    // }

// ambil data siswa dari object result (fetch)
    // ada 4 cara yaitu:
        // 1.) mysqli_fetch_row() //return array numerik
        // 2.) mysqli_fetch_assoc()//return array associative
        // 3.) mysql_fetch_array()// bisa mereturn numerik dan associative, namun kekurangannya datanya menjadi dobel
        // 4.) mysqli_fetch_object()

// memanggilnya:
// $show = mysqli_fetch_assoc($result);
// var_dump($show["nama"]);

//jadi bisa $show[1] atau $show["nama"] kecuali object menggunakan $show->email


// jika menampilkan semuanya maka menggunakan perulangan:
// while ($show = mysqli_fetch_assoc($result)) {
//     var_dump($show["nama"]);
// }
?>



<!-- Sekarang gimana cara menampilkannya ke dalam tabel? -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body style="height:100vh;display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <table border="1" cellpadding="10" cellspacing="0">
        <p><a href="INSERT.php" target="_blank">Add data</a></p><br>
        <style>
        tr td {
            text-align: center;
        }
        </style>
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
            while ($row = mysqli_fetch_assoc($result)) :
        ?>
        <tr>
            <td><?= $iD ?></td>
            <!-- kita tidak boleh menggunakan id ini karena saat ada urutan row yang terhapus di table maka urutanya tidak akan menjadi urut -->
            <td>
                <a href="UPDATE.php?id=<?= $row['id'] ?>">Edit</a><br>
                <a href="DELETE.php?id=<?= $row['id'] ?>" onclick="return confirm('Sure?');">Delete</a>
            </td>
            <td><img src="../../assets/<?= $row['gambar'] ?>" alt="Photo Profile" width="50"></td>
            <td><?= $row["nis"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
        </tr>
        <?php
            $iD++;
            endwhile 
         ?>
    </table>
</body>

</html>