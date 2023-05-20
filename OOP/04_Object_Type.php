<!-- Object Type -->
<!-- 
    Pada umumnya kita menggunakan tipe data integer string boolean dan array. Tapi kali ini kita akan menggunakan tipe data Obejct pada class yang akan kita gunakan
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

        return "$this->penulis, $this->penerbit";
    }
}


// Contoh saya ingin membuat sebuah functionalitas untuk mencetak informasi lengkap dari produk yang saya miliki
class infoProduk
{
    // Agar class infoProduk hanya menerima class dari produk caranya adalah menambah nama classnya
    public function cetakInfo(Produk $produk)
    {
        // ketika produk di instace maka akan menjadi object, objectnya ini bisa kita buat menjadi argumen untuk class ini
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Produk("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000);
echo "Label: " . $produk1->getLabel() . "<br>";

// test nilai default
$produk2 = new Produk("Sejarah dunia yang disembunyikan");
var_dump($produk2);


echo "<br>";


// Mencetak info produk 1
$infoProduk1 = new infoProduk();
echo $infoProduk1->cetakInfo($produk1);