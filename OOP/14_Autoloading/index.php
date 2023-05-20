<?php

require 'App/init.php';

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 12);

// mencetak produk
$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetakInfo();