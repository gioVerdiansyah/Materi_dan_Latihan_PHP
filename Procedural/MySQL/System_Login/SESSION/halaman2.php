<!--
     Sebagai contoh saya ingin mencetak variabel nama di halaman1, itu tentu tidak bisa, namun dengan menggunakan session itu bisa
-->

<?php
// dihalaman 2 ini pun juga jangan lupa nyalakan session-nya
session_start();

echo $_SESSION["nama"];
?>

<!-- 
     agar mencetak nilai kita harus masuk kedalam halaman1 dahulu untuk mencetak nilai-nya

     Nilai ini akan tetap ada walau tab-nya di close, namun akan hilang jika dalam satu sesi artinya jika browser di tutup atau komputer di restart
-->