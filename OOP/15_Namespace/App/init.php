<?php
// require semua class
// require 'Produk/DetailProduk.php';
// require 'Produk/Produk.php';
// require 'Produk/Buku.php';
// require 'Produk/Anime.php';
// require 'Produk/CetakInfoProduk.php';
// require 'Produk/User.php';

// require 'Service/User.php';


// spl_autoload_register(function ($class) {
//     require __DIR__ . '/Produk/' . $class . '.php';
// });
// Jika kita menulis require __DIR__ . '/Produk/' . $class . '.php'; di atas maka PHP akan mengasumsikan bahwa semua class yang ada di Produk itu harus ada juga di dalam Service karena parameternya $class

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    // ["App", "Produk", "User"]
    $class = end($class); // end maka akan mengambil index dari terakhir array
    require __DIR__ . '/Produk/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    $class = end($class);
    require __DIR__ . '/Service/' . $class . '.php';
});