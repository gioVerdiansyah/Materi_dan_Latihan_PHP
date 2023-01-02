<?php
$siswa_RPL = [
    "siswa_rpl_2_1" =>[
        "nrp"=>"01010010",
        "nama"=> "Verdi",
        "ahli"=> "Full Stack",
        "email"=> "emailku@gmail.com",
        "photo_profile"=> "photo_profile2.jpg"
    ],
    "siswa_rpl_2_2" =>[
        "nama"=> "Adi",
        "nrp"=>"01001010",
        "ahli"=> "Front End dan Back End",
        "email"=> "emailAdi@gmail.com",
        "photo_profile"=> "photo_profile.jpg"
    ],
    "siswa_rpl_2_3" =>[
        "nama"=> "Sandi",
        "nrp"=>"000101001",
        "ahli"=> "Design",
        "email"=> "emailSandi@gmail.com",
        "photo_profile"=> "20221130_203451.png",
    ]
];

$jumlah_siswa_RPL = count($siswa_RPL);
$berapa_kali = $jumlah_siswa_RPL + 2;

for($j= $jumlah_siswa_RPL +=1 ;$j <= $berapa_kali; ++$j) {
    $siswa_RPL["siswa_rpl_2_$j"]=[ 
        "nama"=> "BHagas",
        "nrp"=> "010100100",
        "ahli"=> "WorkOut",
        "email"=> "BHgas55@gmail.com",
        "photo_profile"=> "20221130_190657.png"
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    th,
    td {
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #D6EEEE;
    }
    </style>
    <table>
        <tr>
            <th colspan="6">Daftar siswa_RPL</th>
        </tr>
        <tr style="font-weight: bold;">
            <td>No.</td>
            <td>Photo</td>
            <td>Nama</td>
            <td>NIS</td>
            <td>Ahli</td>
            <td>Email</td>
        </tr>
        <?php for($i = 1; $i <= count($siswa_RPL);$i++) : ?>
        <tr>
            <td>
                <?= $i ?>
            </td>
            <td>
                <img src="assets/<?=$siswa_RPL['siswa_rpl_2_'.$i]['photo_profile']?>" alt="photo_profile siswa_RPL"
                    style="width:40px;height:40px;">
            </td>
            <td><?= $siswa_RPL["siswa_rpl_2_$i"]["nama"] ?></td>
            <td><?= $siswa_RPL["siswa_rpl_2_$i"]["nrp"] ?></td>
            <td><?= $siswa_RPL["siswa_rpl_2_$i"]["ahli"] ?></td>
            <td><?= $siswa_RPL["siswa_rpl_2_$i"]["email"] ?></td>
        </tr>
        <?php endfor;?>
    </table>
    <!-- info --->
    <p class="info" style="cursor: pointer;width:min-content;text-decoration:underline;margin:16px 0 5px 0">info...</p>
    <div class="log_info" style="display: none;">
        <?php
            echo "jumlah array: " . count($siswa_RPL)."<br>";
        for ($p = $jumlah_siswa_RPL; $p <= $berapa_kali; ++$p) {

            echo "nambah siswa ke-" . $p . " = " . $siswa_RPL["siswa_rpl_2_$p"]["nama"] . "<br>";
        }
        ?>
        <p id="hilang" style="cursor: pointer;width:min-content;text-decoration:underline;margin:5px 0 16px 0">hidden
        </p>
    </div>
    <!-- function -->
    <script>
    let info = document.querySelector(".info");
    info.addEventListener("click", keluar);
    let menghilang = document.querySelector("#hilang").addEventListener("click", hilang);
    let log_info = document.querySelector(".log_info");

    function keluar() {
        info.innerText = "info:";
        log_info.removeAttribute("style");
        info.setAttribute("style", "width:min-content;margin:16px 0 5px 0");
    }

    function hilang() {
        info.innerText = "info...";
        log_info.setAttribute("style", "display: none")
        info.setAttribute("style", "cursor: pointer;text-decoration:underline;width:min-content;margin:16px 0 5px 0");
    }
    </script>
</body>

</html>