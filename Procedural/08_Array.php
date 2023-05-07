<!-- Array adalah variabel yang dapat menampung lebih dari satu nilai 
pasangan antara key dan value
key-nya adalah indeks
-->

<!-- Contoh -->
<?php
$nama = "Verdi";// ini satu nilai, namun array bisa lebih

// di PHP sendiri terdapat 2 cara yaitu cara lama dan cara baru

// cara lama:
$nama_nama_keluarga = array("Sofyan", "Verdi", "Agung", "Sunarsi", "Ropik");

// cara baru:
$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Saptu", "Minggu"];

// array ini juga dapat menyimpan banyak tipe data:
$arry = ["Vwerdi", 123, true, false, ["array dalam array"]];



// #Menampilkan Array
// Ada 2 cara yaitu menggunakan var_dump() dan print_r()
var_dump($nama_nama_keluarga);//hasil:
// array(5) { [0]=> string(6) "Sofyan" [1]=> string(5) "Verdi" [2]=> string(5) "Agung" [3]=> string(7) "Sunarsi" [4]=> string(5) "Ropik" }
echo "<br>";

print_r($hari);
// Array ( [0] => Senin [1] => Selasa [2] => Rabu [3] => Kamis [4] => Jum'at [5] => Saptu [6] => Minggu )
echo "<br>";



// #bagaimana jika kita hanya ingin menampilkan satu elemen atau beberapa element?
// nah ini baru bisa menggunakan echo karena kita sudah memilihnya

echo $hari[6] . ", " . $arry[0];
echo "<br>";




// #Menambahkan elemen baru pada array
$nama_nama_keluarga[] = "Andre";
print_r($nama_nama_keluarga)
?>



<!-- Menampilkan isi Array dengan pengulangan khusus untuk Array -->
<?php
$angkaSembarang = [3, 2, 15, 20, 11, 77, 89,100,105];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foreach</title>
    <style>
    .row {
        display: flex;
        flex-direction: row;
    }

    .col {
        width: 50px;
        height: 50px;
        background-color: chartreuse;
        text-align: center;
        line-height: 50px;
        margin: auto;
        margin: 5px;
    }
    </style>
</head>

<body>
    <div class="row">
        <?php for ($i = 0; $i < count($angkaSembarang); $i++) : ?>
        <div class="col">
            <?= $angkaSembarang[$i]; ?>
        </div>
        <?php endfor?>
    </div>

    <div class="row">
        <?php foreach($nama_nama_keluarga as $tempatTampung) :?>
        <div class="col"><?= $tempatTampung ?></div>
        <?php endforeach ?>
    </div>
</body>

</html>



<!-- Study khasus:
Kita mau membaut sebuah data mahasiswa dalam bentuk list di HTML
-->
<?php
$siswa = [
    ["Verdi","01010010","Rekayasa Perangkat Lunak","emailku@gmail.com"],
    ["Adi","001100110","Rekayasa Perangkat Lunak","emailAdi@gmail.com"],
    ["sandi","001110101","Rekayasa Perangkat Lunak","emailSandi@gmail.com"]
    ]
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <h3>Daftar mahasiswa</h3>
    <?php foreach($siswa as $sswa) : ?>
    <ul>
        <li>Nama: <?= $sswa[0] ?></li>
        <li>NRP: <?= $sswa[1] ?></li>
        <li>Jurusan: <?= $sswa[2] ?></li>
        <li>Email: <?= $sswa[3] ?></li>
    </ul>
    <?php endforeach?>
</body>

</html>

<!-- Kekurangannya di atas adalah jika isi dari Array tidak urut maka yang ditampilkan juga akan tidak urut juga dan jika isi Arraynya kurang maka akan terjadi error,
nah ini dinamakan Array numerik

Array numerik adalah Array yang indeksnya adalah angka-->


<!-- nah untuk e mengubah hal tersebut maka kita menggunakan method Array Associative
hal tersebut mengubah index dari Array menjadi String -->