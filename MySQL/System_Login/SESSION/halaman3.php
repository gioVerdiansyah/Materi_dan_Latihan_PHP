<!-- 
    Kita bisa mengihilangkan session tanpa perlu menutup atau merestart komputer
 -->

<?php
session_start();

// mengilangkan semua session
session_destroy();
?>

<!-- 
    Sehingga jika halaman ini dikunjungi maka akan menghapus semua session
 -->