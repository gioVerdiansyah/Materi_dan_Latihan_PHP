<!-- Constructor -->
<!-- 
    Merupakan sebuah method yang spesial atau khusus yang ada di dalam sebuah class. Spesial karena method yang otomastis dijalankan ketika sebuah class kita instansiasi
 -->

<?php
class Produk
{
    public $judul, $penulis, $penerbit, $harga;

    // constructor
    public function __construct($judul = "Buku", $penulis = "Penulis Buku", $penerbit = "Penerbit Buku", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getLabel()
    {

        return "$this->judul";
    }
}
$produk1 = new Produk("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000);
echo "Judul Buku: " . $produk1->getLabel() . "<br>";

// test nilai default
$produk2 = new Produk("Sejarah dunia yang disembunyikan");
var_dump($produk2);