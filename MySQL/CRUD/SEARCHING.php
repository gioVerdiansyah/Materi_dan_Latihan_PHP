<?php
// koneksi ke databases
    $db = mysqli_connect(
        "localhost", //nama hostnya
        "root", //Username hostnya
        "", //Passwordnya
        "latihandasar" //Databasenya
        );

// Mengambil data dari tabel siswa / query data siswa
        function query ($query){
            global $db;
            $result = mysqli_query($db, $query);
            $rows = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
$siswa = query("SELECT * FROM siswa_rpl ORDER BY id DESC");


// SEARCHING
// contoh konsep:
// "SELECT * FROM siswa_rpl WHERE nama = 'Verdi'"

// jika ada maka akan munculkan satu data yang ada nama dengan value Verdi
// jika tidak ada maka akan kosong



// tombol cari ditekan, maka kita akan timpa query-nya sesuai value dari pencariannya
if(isset($_POST["submit"])){
    $siswa = search($_POST["search"]);
    // jadi nanti $result ini akan berisi data dari function search, lalu function search ini akan mendapatkan apapun yang diketikan dari usernya
}

function search($key){
    $query = "SELECT * FROM siswa_rpl 
            WHERE
                nama LIKE '%$key%' OR
                nis LIKE '$key'
            ORDER BY id DESC";
    return query($query);
    // jadi kita return nilai function ini ke function query

    // SYNTAX LIKE adalah cara agar kita bisa mencari nama seseorang dengan fleksibel baik nama depan maupun belakangnya
    // OR syntax mempilkan ini atau ini maka yang akan di cari sesuai yang ada di query berdasarkan WHERE
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body style="display:flex; align-items: center; justify-content: center; flex-direction: column;">
    <style>
    tr td {
        text-align: center;
    }

    .parent {
        display: flex;
        flex-direction: column;
    }

    .kelompok {
        width: 100%;
        margin: 5px 0;
        display: flex;
        align-items: center;
        align-self: flex-start;
        justify-content: space-between;
    }

    .add-data a {
        color: white;
        text-decoration: none;
    }

    h1 {
        display: flex;
        justify-self: flex-start;
        align-self: flex-start;
    }
    </style>

    <h1>SEARCHING</h1>

    <div class="parent">
        <div class="kelompok">
            <form action="" method="post">
                <input type="search" name="search" id="search" placeholder="Search Data..." autocomplete="off" autofocus
                    required>
                <button type="submit" name="submit">Search</button>
            </form>
            <button class="add-data"> <a href="INSERT.php" target="_blank">Add data</a> </button>
        </div>
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
            foreach ($siswa as $row) :
        ?>
            <tr>
                <td><?= $iD ?></td>
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
            endforeach 
         ?>
        </table>
    </div>
</body>

</html>