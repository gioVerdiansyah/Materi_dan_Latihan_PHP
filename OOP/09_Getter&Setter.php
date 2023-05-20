<!-- Setter dan Getter -->
<!-- 
    Adalah deklarasi method pada class untuk memberi nilai dan membaca nilai. Ini dilakukan agar selain didalam class tertentu tidak akan bisa mengakses secara langsung property.
 -->

<?php
class Produk
{
    private $judul, $penerbit, $harga, $penulis, $diskon = 0;

    // constructor
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }


    // ! Setter
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function setPenulis($penulis)
    {
        if (!is_string($penulis)) {
            throw new Exception("Penulis harus bertipe String!");
        }
        $this->penulis = $penulis;
    }
    public function setPenerbit($penerbit)
    {
        if (!is_string($penerbit)) {
            throw new Exception("Penerbit harus bertipe String!");
        }
        $this->penerbit = $penerbit;
    }
    public function setJudul($judul)
    {
        if (!is_string($judul)) {
            throw new Exception("Judul harus bertipe String!");
        }
        $this->judul = $judul;
    }

    public function setHarga($harga)
    {
        if (!is_numeric($harga)) {
            throw new Exception("Harga harus bertipe Angka!");
        }
        $this->harga = $harga;
    }


    // ! Getter
    public function getJudul()
    {
        return $this->judul;
    }
    public function getPenerbit()
    {
        return $this->penerbit;
    }
    public function getPenulis()
    {
        return $this->penulis;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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

echo $produk1->getHarga();


echo "<br>";
echo "<hr>";
echo $produk2->getPenulis();
echo "<br>";

$produk1->setDiskon(50);

echo $produk1->getHarga();



echo "<hr>";

$produk3 = new Produk("Produk ke tiga");
echo $produk3->getJudul(); //! Getter

echo "<br>";

$produk3->setJudul("New Book"); //! Setter
echo $produk3->getJudul();

$produk3->setHarga(123);
echo "<br>" . $produk3->getHarga();