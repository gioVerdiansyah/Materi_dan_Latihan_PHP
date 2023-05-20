<!-- Inheritance -->
<!-- 
    Menciptakan hierarki antar kelas (Parent & Child)
    Child Class mewarisi semua property dan method dari Parent-nya (yang visible)
    Child Class memperluas (extends) fungsionalitas dari parentanya

    Misal saya ingin menambah fungsionalitas dari class Produk untuk menampilkan info produk secara lebih detail(gabungan antara Produk dan infoProduk)

    Contoh
    Buku: Filosofi Teras | Hendry Manampiring, Buku Kompas (Rp. 90000) - 346 halaman
    Anime: Konosuba | Natsume Akatsuki, Kadokawa Shoten (Rp. 2000000) - 12 eps
 -->
<?php
// ! Ini adalah contoh tanpa menerapkan metode Inheritance OOP
class Produk
{
    public $judul, $penulis, $penerbit, $harga, $jmlhHalaman, $jmlhEps, $tipe;

    // constructor
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhHalaman = 0, $jmlhEps = 0, $tipe = null)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlhHalaman = $jmlhHalaman;
        $this->jmlhEps = $jmlhEps;
        $this->tipe = $tipe;
    }
    public function getLabel()
    {

        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        if ($this->tipe == "Buku") {
            $str .= " - {$this->jmlhHalaman} halaman.";
        } else {
            $str .= " - {$this->jmlhEps} eps.";
        }
        return $str;
    }
}

class infoProduk
{
    public function cetakInfo(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Produk("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100, 0, "Buku");
$produk2 = new Produk("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 0, 12, "Anime");

echo $produk1->getInfoProduk() . "<br>";
echo $produk2->getInfoProduk();