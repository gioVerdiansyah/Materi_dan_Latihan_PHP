<!-- Visibility -->
<!-- 
    Konsep yang digunakan untuk mengatur akses dar property&method pada sebuah class
    Ada 3 keyword visibility: public, protected, dan private
    
    public dapat digunakan dimana saja bahkan diluar class
    protected, hanya dapet digunakan didalam sebbuah class beserta keturunannya
    private, hanya dapat digunakan didalam sebuah class tertentu


    #Kenapa harus menggunakan Visibility?
    1. Hanya memperlihatkan aspek dari class yang dibutuhkan oleh 'client'
    2. Menentukan kebutuhan yang jelas untuk object
    3. Memberikan kendali pada kode untuk menghindari 'bug'
 -->

<?php
class Produk
{
    public $judul, $penerbit;
    protected $diskon = 0, $harga;
    private $penulis;

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

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }
}

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

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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

    // public function getPenulis()
    // {
    //     return $this->penulis;
    // }
}

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 12);

echo $produk1->getInfoProduk() . "<br>";
echo $produk2->getInfoProduk();


echo "<hr>";


// contoh problem pada visibility public kita bisa seenaknya mengganti nilai yang di instance menjadi nilai baru:

// $produk1->harga = 1000;
// echo $produk1->harga;

// ini bahaya, cara mengatasinya kita bisa mengganti property/method yang kita inginkan menjadi protected atau private. Jika sudah di set maka jika saat kita mengaksesnya maka akan error (Fatal error: Uncaught Error: Cannot access protected property Buku::$harga)

// Tapi kita juga tidak bisa menampilkan isi harga dengan echo karena harga sudah di lindungi, caranya kita bisa menambah method baru pada turunannya untuk mengembalikan nilai pada harga.
echo $produk1->getHarga();


echo "<br>";


// private
// jika saya kasih private pada penulis maka yang sekarang masih bisa pakai adalah class Produk saja.
// jika saya ingin akses penulis dengan metode yang sama pada harga maka penulis akan tidak dikenali (undifined)

echo $produk2->getPenulis(); //Undefined property: Anime::$penulis in

// Jika ingin tetap jalan maka pindahin saja method getPenulis() yang ada di class Anime ke dalam class Produk


echo "<br>";


// Untuk mengecek kelemahan pada tipe public kita bisa menambahkan fungsionalitas baru pada class Produk yaitu diskon, yang jika method getDiskon di panggil maka harganya akan berkurang

$produk1->setDiskon(50); //diskon 50%

// Karena property diskon adalah public maka kita bisa isi nilainya sesuka kita:
// $produk1->diskon = 90;
// Solusinya kita bisa mengubah tipenya menjadi protected

echo $produk1->getHarga();