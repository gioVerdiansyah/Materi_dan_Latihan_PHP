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
?>


<!-- fungsi membuat file ini adalah pemisahan logika agar tidak tercampur dan terlihat banyak di file yang membutuhkan -->