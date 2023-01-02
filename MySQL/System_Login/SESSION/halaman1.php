<!--SESSION
    Definisi = "Mekanisme penyimpanan informasi ke dalam variabel agar bisa digunakan lebih dari satu halaman"
    Jadi mirip dengan GET dan POST namun SESSION ini dapat mengirimkan data lebih dari 2 halaman!

    SESSION ini adalah variabel superglobals yang namanya : $_SESSION

    Untuk mengisikan data kedalam SESSION ini ada syaratnya, syaratnya yaitu harus menjalankan function:
    session_start() //ini sebelum menuliskan syntax HTML

    contohnya dari session ini adalah = Membuat user tidak dapat mengakses halaman tertentu sebelum melakukan login dahulu
 -->

<!-- Contoh mekanisme-nya -->

<?php
// sebagai contoh saya mencetak tulisan "Verdi" dihalaman ini

// $nama = "Verdi";
// echo "$nama";

// normal namun jika saya ingin mencetak di halaman2.php  maka tidak bisa

// caranya adalah menggunakan session:
session_start(); //memulai session
$_SESSION["nama"] = "Verdi";
// nama adalah nama variabelnya dan "Verdi" adalah value nya
?>