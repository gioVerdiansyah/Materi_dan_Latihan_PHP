<!-- i want print key of array -->

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
        ]
    ];

    // print_r(array_keys($siswa_RPL));//for exam


    // this is the way:
    $keys = array_keys($siswa_RPL);//return array of keys

    foreach ($keys as $key) {
        echo $key . "<br>";
    }
?>