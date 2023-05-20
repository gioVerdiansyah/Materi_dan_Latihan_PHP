<?php
// require semua class
// require 'Produk/DetailProduk.php';
// require 'Produk/Produk.php';
// require 'Produk/Buku.php';
// require 'Produk/Anime.php';
// require 'Produk/CetakInfoProduk.php';

// daripada memanggil satu satu kita dapat memanfaatkan fungsi spl_autoload_register()
spl_autoload_register(function ($class) {
    require __DIR__ . '/Produk/' . $class . '.php';
});
// Jadi parameter $class itu adalah callback function untuk funtion apl_autoload_register() itu sendiri, jadi kita cukup menulis alamat folder dan nama classnya lalu .php itulah adalah mengapa kita harus menyamakan nama class dengan filenya