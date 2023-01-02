<?php
// koneksi ke DBMS
$db = mysqli_connect(
    "localhost",
    "root",
    "",
    "latihandasar"
    );

    
    function query ($query){
        // ditampung dahulu
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    // ambil ID di URL
    $id = $_GET["id"];
    
    // query data siswa berdasarkan ID di URL
    $siswa = query("SELECT * FROM siswa_rpl WHERE id = $id")[0];

    // [0] adalah saat kita panggil function query() begitu dimasukkan kedalam array $rows yang kita ambil adalah index pertamanya


    // function update
function update($data){
    // ambil data dari tiap elemen form
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    global $db,$id;
    $query = "UPDATE siswa_rpl SET 
                nama = '$nama' , nis = '$nis', email = '$email', jurusan = '$jurusan', gambar = '$gambar'
            WHERE id = $id
            -- kelebihan di id jadi tak perlu membuat input kosong
    ";
    
    mysqli_query($db, $query);

    // cek
    return mysqli_affected_rows($db);
}

        
// cek apakah tombol submit sudah di tekan atau belum
    if(isset($_POST["submit"])) {

    // cek apakah data berhasil di diubah atau tidak
    mysqli_affected_rows($db);

    // lalu untuk mengeceknya:
    if(update($_POST) > 0){
        echo "Data berhasil di diubah";
    }else{
        echo "Data gagal di diubah" . "<br>" . mysqli_error($db);
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

    <form action="" method="post">
        <ul>
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
                <label for="gambar">Gambar : </label><br>
                <input type="text" name="gambar" id="gambar" required value="<?= $siswa['gambar'] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Send</button>
            </li>
        </ul>
    </form>
</body>

</html>