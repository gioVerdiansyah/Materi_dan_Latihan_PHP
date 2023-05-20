<?php
namespace Inheritance; //bentrok cuy!

class Produk
{
    public $judul, $penulis, $penerbit, $harga, $jmlhHalaman, $jmlhEps;

    // constructor
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhHalaman = 0, $jmlhEps = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlhHalaman = $jmlhHalaman;
        $this->jmlhEps = $jmlhEps;
    }
    public function getLabel()
    {

        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Buku extends Produk
{
    public function getInfoProduk()
    {
        $str = "Buku : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlhHalaman} halaman.";
        return $str;
    }
}

class Anime extends Produk
{
    public function getInfoProduk()
    {
        $str = "Anime : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlhEps} eps.";
        return $str;
    }
}

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100, 0);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 0, 12);

echo $produk1->getInfoProduk() . "<br>";
echo $produk2->getInfoProduk();