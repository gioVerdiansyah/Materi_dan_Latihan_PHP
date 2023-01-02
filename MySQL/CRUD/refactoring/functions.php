<?php
// READ
    // koneksi ke databases
    $db = mysqli_connect(
        "localhost",
        "root",
        "",
        "latihandasar"
        );

function query ($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// isi parameternya adalah untuk menangkap isi dari string mysqli_query dan didalamnya kita panggil querynya
// $rows adalah wadah untuk menampung isi dari querynya
// lalu ketika di ambil datanya menggunakan looping maka isi dari $row di pindah ke $rows dan return $rows



// INSERT
function add($data){
    // ambil data dari tiap elemen form
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // htmlspecialchars() jika user memasukkan perintah seperti tag html itu tidak akan dijalankan melainkan akan ditulis menjadi string


    // UPLOAD
    // yang akan kita lakukan adalah memodifikasi supaya gambar di upload ke directory lalu kita ambil nama gambarnya dan baru kita insert ke DB

    // UPLOAD gambar
    $gambar = upload();
    // fungsi upload ini akan melakukan 2 yaitu meng-upload dan variabel gambar ini akan diisi dengan nama gambar
    // jika gagal maka fungsi ini tidak akan mengirimkan nama gambarnya

    // cek
    if(!$gambar){
        // jika isinya tidak gambar / $gambar === false maka berhentikan fungsi tambah ini dan INSERT-nya tidak akan dijalankan dan akan menghasilkan nilai false pada fungsi add()
        return false;
    }
    

    // $gambar = htmlspecialchars($data["gambar"]); akan kita ambil setelah kita berhasil mengupload filenya
    // kalau gagal maka query di bawah ini tidak akan dijalankan
    

    // query insert data
    global $db;
    $query = "INSERT INTO siswa_rpl VALUES ('','$nama','$nis','$email','$jurusan','$gambar')";
    
    mysqli_query($db, $query);

    // cek
    return mysqli_affected_rows($db);
}
// function ini akan menerima parameter berupa $data
// yang didalamnya berupa penampung data dari POST

// Function UPLOAD
function upload()
{
    // untuk mengelola function ini kita akan mengambil dahulu $_FILES
    $fileName = $_FILES["gambar"]["name"];
    // $fileType = $_FILES["gambar"]["type"];
    // mengambil ukuran filenya
    $fileSize = $_FILES["gambar"]["size"];
    // error untuk mengetahui ada gabar yang diupload atau tidak
    $fileError = $_FILES["gambar"]["error"];
    // tempat penyimpanan sementara (temp)
    $fileTemp = $_FILES["gambar"]["tmp_name"];


    // #cek apakah tidak ada gmabar yang diupload
    if ($fileError === 4) {
        // 4 ini adalah nomor untuk pesan error dalam array $_FILES
        // pesan kesalahannya
        echo "<script>
                alert('masukkan gambar!');
            </script>";

        return false;
    }

    // #cek apakah user memasukkan gambar atau bukan
    $extensionValid = ["jpg", "jpeg", "png"]; //ekstensi yang diperbolehkan
    // sekarang kita ambil ekstensi file dari gambar yang di upload:
    $extensionFile = explode(".", $fileName);
    // ini artinya jika saya punya file bernama verdi.jpg makan akan dipecah menjadi array yang isinya ["verdi","jpg"]

    // sebetulnya kita hanya membutuhkan ekstensi filenya saja, setelah di pecah maka kita bisa mengambil ekstensi nama filenya aja dengan cara menambil nomor indexnya:
    $extensionFile = strtolower(end($extensionFile));
    // untuk mengatasi user jika memasukkan seperti ini: 
    // verdi.JPG (huruf besar) kita akan memaksa membuat ini menjadi huruf kecil dengan fungsi strtolower()
    // + verdi.123.jpg kita menggunakan end() agar mendapatkan index yang terakhirnya

    // #cek apakah ekstensi yang diupload sesuai atau tidak?
    if (!in_array($extensionFile, $extensionValid)) {
        // in_array adalah fungsi untuk mengecek apakah sebuah string ada di dalam array atau tidak
        // jika user tidak memasukkan ekstensi yang valid maka kasih pesan
        echo "<script>
                alert('masukkan ekstensi gambar: \"jpg\",\"jpeg\",\"png\"!');
            </script>";
        return false;
    }


    // #cek jika ukuran gambar terlalu besar
    if ($fileSize > 5000000) {
        // lebih besar dari 5MB
        echo "<script>
                alert('masukkan image < 5MB!');
            </script>";
        return false;
    }

    // generate nama gambar jika ada user yang nama gambarnya sama
    $fileGenerateName = uniqid();
    $fileGenerateName .= ".";
    $fileGenerateName .= $extensionFile;
    // contoh hasil: "63a5ad0e34746.jpg"


    // Lolos pengecekan, gambar siap diupload
    move_uploaded_file($fileTemp, '../../../assets/TEMP/' . $fileGenerateName);
    // memindahkan dari TEMP ke tempat tujuannya

    return $fileGenerateName;
}

// DELETE

function del($id){
    global $db;
    mysqli_query($db, "DELETE FROM siswa_rpl WHERE id = $id");

    return mysqli_affected_rows($db);
}


// UPDATE
function update($data){
    // ambil data dari tiap elemen form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $oldImage = htmlspecialchars($data["oldImage"]);


    // cek user menekan tombol UPLOAD atau tidak? (memilih gambar baru)
    if($_FILES["gambar"]["error"] === 4){
        // dari input file error = 4 adalah tanda tidak ada gambar yang dimasukkan
        $gambar = $oldImage;
        // $gambar diisi dengan variabel oldImage yang isinya adalah gambar yang sama dari DB
    }else{        
        // maka jika error selain 4 maka gambar akan dimasukkan di variabel ini
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
function search($key){
    $query = "SELECT * FROM siswa_rpl 
            WHERE
                nama LIKE '%$key%' OR
                nis LIKE '$key'
            ORDER BY id DESC";
    return query($query);
    // jadi kita return nilai function ini ke function query
    // syntax LIKE adalah cara agar kita bisa mencari nama seseorang dengan fleksibel baik nama depan maupun belakangnya
    // OR syntax mempilkan ini atau ini maka yang akan di cari sesuai yang ada di query berdasarkan WHERE
}


?>


<!-- fungsi membuat file ini adalah pemisahan logika agar tidak tercampur dan terlihat banyak di file yang membutuhkan -->