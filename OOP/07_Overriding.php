<!-- Overriding -->
<!-- 
    Overriding adalah sebuah istilah dimana kita bisa membuat method di class child yang memiliki nama yang sama dengan class parentnya
 -->
<?php
class Produk
{
    public $judul, $penulis, $penerbit, $harga;

    // constructor
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
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

// ! menggunakan parent::<propert/method parent>
class Buku extends Produk
{
    public $jmlhHalaman;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlhHalaman = $jmlhHalaman;
    }
    public function getInfoProduk()
    {
        $str = "Buku : " . parent::getInfoProduk() . " - {$this->jmlhHalaman} halaman.";
        return $str;
    }
}

class Anime extends Produk
{
    public $jmlhEps;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhEps = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlhEps = $jmlhEps;
    }
    public function getInfoProduk()
    {
        $str = "Anime : " . parent::getInfoProduk() . " - {$this->jmlhEps} eps.";
        return $str;
    }
}

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 12);

echo $produk1->getInfoProduk() . "<br>";
echo $produk2->getInfoProduk();