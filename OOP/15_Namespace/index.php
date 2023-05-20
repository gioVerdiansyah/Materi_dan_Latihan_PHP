<?php

require 'App/init.php';

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 12);

// mencetak produk
$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetakInfo();

echo "<hr>";


use App\Service\User; // ini adalah alias jika suatu saat kita memiliki nama namespace yang panjang

new User;

echo "<br>";

// Kita tidak bisa menggunakannya untuk User yang ada di Produk, jadi mau g mau harus pakai namespacenya
// Jika ingin tetap memakainya kita bisa menambahkan as sebagai perumpamaan namanya
use App\Produk\User as ProdukUser;

new ProdukUser;