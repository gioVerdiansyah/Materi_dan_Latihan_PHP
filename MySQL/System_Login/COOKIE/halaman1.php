<!-- 
    COOKIE ini mirip dengan SESSION yaitu informasi yang bisa diakses dimana saja di halaman web kita

    Tapi bedanya COOKIE ini disimpan didalam browser client dan sehingga client ini bisa memanipulasi COOKIE-nya (bisa CRUD) berbeda dengan SESSION yang disimpan kedalam server

    #manfaat COOKIE:
        mengenali user
        shopping cart
        personalisasi (untuk mengetahui prilaku user)
        ...

    Karena COOKIE ini dapat di CRUD oleh user maka akan memiliki celah keamanan

    Studi Khasus kita akan membuat fitur remember me, yaitu fitur jika di checklist maka menggunakan COOKIE sedangkan jika tidak maka menggunakan SESSION, fungsinya untuk mengingatkan user jika masuk ke halaman ini lagi maka otomatis masuk dan tak perlu login lagi

    $_COOKIE ini adalah variabel superglobals untuk COOKIE
    variabel ini lah yang akan kita gunakan untuk mengakses nilai COOKIE didalam browser

    untuk menjalankan COOKIE kita harus menjalankan fungsi:
    setcookie();
    terlebih dahulu
 -->



<?php
// contoh cookie
setcookie("nama", "Verdi");

// Jika ingin mengasih waktu atau masa expired-nya:
setcookie("expired", "30second", time() + 30);
// time() + 30 ini adalah waktu sekarang di tambah 30 detik kedepan
?>