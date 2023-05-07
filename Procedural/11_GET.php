<?php
// $_GET
// jika kita cek menggunakan var_dump() maka array(0) { }
// kosong, nah gimana cara mengisinya? sama aja seperi array associative:

$_GET["nama"] = "Verdi";
var_dump($_GET);//maka otomatis masuk datanya
echo "<br>";

// namun untuk $_GET ini ada cara lain untuk menambahkan data kedalamnya, yaitu dengan menggunakan string didalam URL-nya : 

// caranya adalah menmabahkan tanda tanya di akhir .php?
// itu artinya adalah, saya memasukkan data kedalam URL ini

// Cara menambahkannya gimana? Caranya adalah dengan menulis pasangan antara key dan value dan dipisahkan dengan sama dengan =

// http://localhost/00_materi_&_latihan_PHP/11_GET.php?jurusan=RPL

// ini artinya saya memasukkan sebuah data yang key-nya adalah "nama" dan value-nya adalah "Verdiansyah" kedalam variabel $_GET
// Yaitu artinya mengirimkan data ke URL ini menggunakan metode request GET

// komentar variabel yang pernah memanggil GET sebelumnya



// bagaimana jika saya ingin menambahkan data lagi?
// yaitu dengan menambahkan symbol &
// http://localhost/00_materi_&_latihan_PHP/11_GET.php?jurusan=RPL&nis=01000101
// array(3) { ["jurusan"]=> string(3) "RPL" ["nis"]=> string(10) "0100101001" ["nama"]=> string(5) "Verdi" }
?>

<!-- dan studi khasus kita menggunakan data siswa_RPL -->

<?php
$siswa_RPL = [
    "siswa_rpl_2_1" =>[
        "nis"=>"01010010",
        "nama"=> "Verdi",
        "ahli"=> "Full Stack",
        "email"=> "emailku@gmail.com",
        "photo_profile"=> "photo_profile2.jpg"
    ],
    "siswa_rpl_2_2" =>[
        "nama"=> "Adi",
        "nis"=>"01001010",
        "ahli"=> "Front End dan Back End",
        "email"=> "emailAdi@gmail.com",
        "photo_profile"=> "photo_profile.jpg"
    ],
    "siswa_rpl_2_3" =>[
        "nama"=> "Sandi",
        "nis"=>"000101001",
        "ahli"=> "Design",
        "email"=> "emailSandi@gmail.com",
        "photo_profile"=> "20221130_203451.png",
    ],
    "siswa_rpl_2_4" =>[
        "nama"=> "BHagas",
        "nis"=> "010100100",
        "ahli"=> "WorkOut",
        "email"=> "BHgas55@gmail.com",
        "photo_profile"=> "20221130_190657.png"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<!-- studi khasus kita adalah hanya menampilkan namanya saja, namun jika kita klik maka muncul detail detailnya
--->

<!-- nah itu menggunakan metode request GET
adalah metode pengiriman data melalui URL dan data tersebut bisa diambil atau ditangkap oleh variabel Superglobals $_GET
-->

<body>
    <h3>Daftar nama siswa_RPL:</h3>
    <ul>
        <!-- ul di pindah keluar karena hanya linya yang mau di ulang(nama saja) --->
        <?php
        $panjang = count($siswa_RPL);
         for($i = 1; $i <= $panjang;$i++) : ?>
        <!-- untuk mengarah ke detailnya maka kita memerlukan anchor -->
        <li>
            <!-- menambahkan data denga method request GET -->
            <!-- dan jika ingin mengirimkan datanya semua maka kita harus mengirimkan satu satu -->
            <a
                href="12_from_GET.php?nama=<?= $siswa_RPL["siswa_rpl_2_$i"]["nama"] ?>&nis=<?= $siswa_RPL["siswa_rpl_2_$i"]["nis"] ?>&ahli=<?= $siswa_RPL["siswa_rpl_2_$i"]["ahli"] ?>&email=<?= $siswa_RPL["siswa_rpl_2_$i"]["email"] ?>&photo_profile=<?= $siswa_RPL["siswa_rpl_2_$i"]["photo_profile"] ?>&panjang=<?= $panjang;?>">
                <?= $siswa_RPL["siswa_rpl_2_$i"]["nama"] ?>
            </a>
        </li>
        <?php endfor;?>
    </ul>
</body>

</html>

<?php
    echo "jumlah array: " . count($siswa_RPL)."<br>";
?>


<!-- untuk selanjutnya kita tidak akan menggunakan cara ini jika datanya sangat panjang -->