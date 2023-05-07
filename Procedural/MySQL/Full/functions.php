<?php
// READ
// koneksi ke databases
$db = mysqli_connect(
    "localhost",
    "root",
    "",
    "latihandasar"
);

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// INSERT
function add($data)
{
    // ambil data dari tiap elemen form
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // UPLOAD gambar
    $gambar = upload();

    // cek
    if (!$gambar) {
        return false;
    }




    // query insert data
    global $db;
    $query = "INSERT INTO siswa_rpl VALUES ('','$nama','$nis','$email','$jurusan','$gambar')";

    mysqli_query($db, $query);

    // cek
    return mysqli_affected_rows($db);
}

// Function UPLOAD
function upload()
{
    // mengambail isi $_FILES
    $fileName = $_FILES["gambar"]["name"];
    $fileSize = $_FILES["gambar"]["size"];
    $fileError = $_FILES["gambar"]["error"];
    $fileTemp = $_FILES["gambar"]["tmp_name"];


    // #cek apakah tidak ada gmabar yang diupload
    if ($fileError === 4) {
        echo "<script>
                alert('masukkan gambar!');
            </script>";

        return false;
    }

    // #cek apakah user memasukkan gambar atau bukan
    $extensionValid = ["jpg", "jpeg", "png"];
    $extensionFile = explode(".", $fileName);
    $extensionFile = strtolower(end($extensionFile));

    // #cek apakah ekstensi yang diupload sesuai atau tidak?
    if (!in_array($extensionFile, $extensionValid)) {
        // in_array adalah fungsi untuk mengecek apakah sebuah string ada di dalam array atau tidak
        echo "<script>
                alert('masukkan ekstensi gambar: \"jpg\",\"jpeg\",\"png\"!');
            </script>";
        return false;
    }


    // #cek jika ukuran gambar terlalu besar
    if ($fileSize > 5000000) {
        echo "<script>
                alert('masukkan image < 5MB!');
            </script>";
        return false;
    }

    // generate nama gambar jika ada user yang nama gambarnya sama
    $fileGenerateName = uniqid();
    $fileGenerateName .= ".";
    $fileGenerateName .= $extensionFile;


    // Lolos pengecekan, gambar siap diupload
    move_uploaded_file($fileTemp, '../../assets/TEMP/' . $fileGenerateName);
    // memindahkan dari TEMP ke tempat tujuannya

    return $fileGenerateName;
}

// DELETE

function del($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM siswa_rpl WHERE id = $id");

    return mysqli_affected_rows($db);
}


// UPDATE
function update($data)
{
    // ambil data dari tiap elemen form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $oldImage = htmlspecialchars($data["oldImage"]);


    // cek user menekan tombol UPLOAD atau tidak? (memilih gambar baru)
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $oldImage;
    } else {
        $gambar = upload();
    }


    // query update data
    global $db;
    $query = "UPDATE siswa_rpl SET 
                nama = '$nama' , nis = '$nis', email = '$email', jurusan = '$jurusan', gambar = '$gambar'
            WHERE id = $id
    ";

    mysqli_query($db, $query);

    // cek
    return mysqli_affected_rows($db);
}


// SEARCHING
function search($key)
{
    $query = "SELECT * FROM siswa_rpl 
            WHERE
                nama LIKE '%$key%' OR
                nis LIKE '$key'
            ORDER BY id DESC";
    return query($query);
}




// REGISTER
function register($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    // strtolower() ini fungsi untuk mengubah huruf besar menjadi huruf kecil, stripslashes() ini fungsi untuk menghilangkan karaker unik dalam username
    $pass = mysqli_real_escape_string($db, $data["pass"]);
    // ini fungsi untuk memungkinkan si user untuk memasukkan password ada tanda kutipnya dan akan dimasukkan ke dalam DB secara aman
    $confirmPass = mysqli_real_escape_string($db, $data["confirmPass"]);


    // cek username sudah ada atau belum?
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    // cari data username dari tabel user dimana username = variabel username (TRUE)

    if (mysqli_fetch_assoc($result)) {
        // berarti TRUE dan arraynya ada isinya
        $err = "username sudah ada!";
        $_SESSION["error"] = $err;
        return false;
    }


    // cek konfirmasi password
    if ($pass !== $confirmPass) {
        $err = "password tidak sama!";
        $_SESSION["error"] = $err;
        return false; //supaya masuk kedalam else
    }

    // Enkripsi password
    // menggunakan fungsi password_hash() untuk mengenkripsi karena jika menggunakan md5 itu adalah versi lama dan mudah untuk diketahui, hanya memasukkan string enkripsinya di google
    $pass = password_hash($pass, PASSWORD_DEFAULT);


    // menambah kan ke dalam database
    mysqli_query($db, "INSERT INTO users VALUE(
        '', '$username', '$pass'
        )");

    return mysqli_affected_rows($db);
}
// SEARCHING
function searching($key)
{
    $query = "SELECT * FROM siswa_rpl 
            WHERE
                nama LIKE '%$key%' OR
                nis LIKE '$key'
            ORDER BY id DESC";
    return query($query);
}
// PAGINATION
// $siswa = query("SELECT * FROM siswa_rpl LIMIT 1,2");
// # angka 2 ini akan digantikan oleh variabel!

// konfigurasi
$jumlahDataPerHalaman = 5;

// # kita harus tahu bakal punya berapa halaman (total)?
// cara hitungnya: jumlah halaman = total data / data per halaman

// Cara satu mengembalikan dalam bentuk object
// $result = mysqli_query($db, "SELECT * FROM siswa_rpl");
// $jumalahData = mysqli_num_rows($result); mengembalikan berapa berapa baris yang dikembalikan oleh SELECT jadi ada berapa siswa dalam tabel siswa_rpl

// Cara dua mengembalikan dalam bentuk array assoc
$jumalahData = count(query("SELECT * FROM siswa_rpl"));

// # mengetahui jumlah halamannya ada berapa dari jumlah diatas
// jika saya tulis 
// $jumlahHalaman = $jumalahData / $jumlahDataPerHalaman;
// begini sebenarnya bisa namun saat jumlah $jumlahDataPerHalaman = 5; lalu jumlah datanya ada 6 maka hasilnya 1.2 dan ini pecahan!

// * membulatkan bilangan ada 2 yaitu dengan round() dan floor() bedanya yaitu round membulatkan ke atas sedangkan floor ke bawah dan ceil() ini gabungan antara round dan floor yaitu jika ke atas round jika ke bawah floor

$jumlahHalaman = ceil($jumalahData / $jumlahDataPerHalaman);

// # mencari tahu kita sedang aktif di halaman keberapa? Dan ini mempengaruhi index dari LIMIT

// $halamanAktif = $_GET["page"];
// dan untuk mendapatkan index halaman yang sedang aktif ini artinya kita membutuhkan GET
// problemnya saat kita baru masuk dan otomastis tidak ada page=1 dan akan undifined
// solusinya kita akan ansumsikan jika tidak ada page= maka otomatis ada dihalaman pertama

// jadi menggunakan kondisi:
// if (isset($_GET["page"])) {
//     $halamanAktif = $_GET["page"]; //jika ada maka gunakan URLnya
// } else {
//     $halamanAktif = 1; //jika tidak ada
// }

// ternary
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;

// Sekarang kita akan mencari logika menghitung:
// halaman = 2, awalData = 4
// jika halamannya = 2 maka awal datanya 2 karena halaman 1 sudah diisi data 0 dan 1, ini jika $jumlahDataPerHalaman = 2

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// jadi sekarang: 2 * 2 = 4 - 2 = 2, misal halaman aktif 3: 2 * 3 = 6 - 2 = 4
// hasil  2 dan 4 ini adalah untuk awalData karena untuk menentukan $jumlahDataPerHalaman
?>


<!-- fungsi membuat file ini adalah pemisahan logika agar tidak tercampur dan terlihat banyak di file yang membutuhkan -->