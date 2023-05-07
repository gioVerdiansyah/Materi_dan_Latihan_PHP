<?php
$mahasiswa = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
echo $mahasiswa[1][1];//mengambil index dari array pertama dulu yaitu dengan index yang mau di tentukan, lalu index kedua untuk array dalam array 
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

    p {
        margin: 0;
    }

    .column {
        display: flex;
        flex-direction: column;
    }

    .col {
        width: 50px;
        height: 50px;
        background-color: chartreuse;
        text-align: center;
        line-height: 50px;
        margin: auto;
        margin: 5px;
        transition: 1s;
    }

    .col:hover {
        transform: rotate(360deg);
        border-radius: 50%;
    }
    </style>
</head>

<body>
    <div class="row">
        <?php foreach($mahasiswa as $tampung_satu) :?>
        <div class="column">
            <?php foreach($tampung_satu as $tampung_dua) :?>
            <div class="col"><?= $tampung_dua ?></div>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>
    </div>
</body>

</html>


<?php
$siswa_RPL_1 = [
    ["Verdi","01010010","Rekayasa Perangkat Lunak","emailku@gmail.com"],
    ["Adi","001100110","Rekayasa Perangkat Lunak","emailAdi@gmail.com"],
    ["sandi","001110101","Rekayasa Perangkat Lunak","emailSandi@gmail.com"]
    ]
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <h3>Daftar mahasiswa</h3>
    <?php foreach($siswa_RPL_1 as $mhs) : ?>
    <ul>
        <li>Nama: <?= $mhs[0] ?></li>
        <li>nis: <?= $mhs[1] ?></li>
        <li>Jurusan: <?= $mhs[2] ?></li>
        <li>Email: <?= $mhs[3] ?></li>
    </ul>
    <?php endforeach?>
</body>

</html>



<!-- Kekurangannya di atas adalah jika isi dari Array tidak urut maka yang ditampilkan juga akan tidak urut juga dan jika isi Arraynya kurang maka akan terjadi error,
nah ini dinamakan Array numerik

Array numerik adalah Array yang indeksnya adalah angka-->


<!-- nah untuk e mengubah hal tersebut maka kita menggunakan method Array Associative
hal tersebut mengubah index dari Array menjadi String -->



<!-- #Array Associative 
Definisinya sama seperti dengan array numerik kecuali
Key-nya adalah String yang kita buat sendiri
-->

<?php
$contoh = ["nama" => "Verdi"];//ini adalah Array Associattive yang indexnya adalah string yang kita buat sendiri

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
    ]
];


$jumlah_siswa_RPL = count($siswa_RPL);

for($j= $jumlah_siswa_RPL +=1 ;$j < $jumlah_siswa_RPL + 2; ++$j) {
    $siswa_RPL["siswa_rpl_2_$j"]=[ 
        "nama"=> "BHagas",
        "nis"=> "010100100",
        "ahli"=> "WorkOut",
        "email"=> "BHgas55@gmail.com",
        "photo_profile"=> "20221130_190657.png"
    ];
    echo "nambah siswa ke-" . $j . " = " . $siswa_RPL["siswa_rpl_2_$j"]["nama"] . "<br>";
}

?>


<!-- kembali ke khasus: -->

<!DOCTYPE html>
<html lang="en">

<body>
    <h3>Daftar siswa_RPL</h3>
    <?php for($i = 1; $i <= count($siswa_RPL);$i++) : ?>
    <ul>
        <li><img src="assets/<?=$siswa_RPL['siswa_rpl_2_'.$i]['photo_profile']?>" alt="photo_profile siswa_RPL"
                style="width:40px;height:40px;">
        </li>
        <li>Nama: <?= $siswa_RPL["siswa_rpl_2_$i"]["nama"] ?></li>
        <li>Nis: <?= $siswa_RPL["siswa_rpl_2_$i"]["nis"] ?></li>
        <li>Ahli dalam bidang RPL: <?= $siswa_RPL["siswa_rpl_2_$i"]["ahli"] ?></li>
        <li>Email: <?= $siswa_RPL["siswa_rpl_2_$i"]["email"] ?></li>
    </ul>
    <?php endfor;?>
</body>

</html>

<?php
    echo "jumlah array: " . count($siswa_RPL)."<br>";
?>
<!-- NOTE penggunaan siswa_rpl_2_$i tidak dapat dikirim di method request karena penerima tidak di dalam for dan berbeda file!
dan tak mungkin kita membuat array lagi hanya untuk mendapatkan panjangnya lalu di pake di for, itu sama saja
 -->