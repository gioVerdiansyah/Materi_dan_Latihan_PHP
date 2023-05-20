<!-- Study Khasus Abstract Class -->

<?php
abstract class Produk
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

    abstract public function getInfoProduk();

    public function getInfo()
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
        $str = "Buku : " . $this->getInfo() . " - {$this->jmlhHalaman} halaman.";
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
        $str = "Anime : " . $this->getInfo() . " - {$this->jmlhEps} eps.";
        return $str;
    }
}

class InfoProduk
{
    public $daftarProduk = [];
    private static $list = 1;
    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }
    public function cetakInfo()
    {
        $str = "DAFTAR PRODUK: <br>";
        foreach ($this->daftarProduk as $produknya) {
            $str .= self::$list++ . ".) {$produknya->getInfoProduk()} <br>";
        }
        return $str;
    }
}

$produk1 = new Buku("Filosofi Teras", "Hendry Manampiring", "Buku Kompas", 90000, 100);
$produk2 = new Anime("Konosuba", "Natsume Akatsuki", "Kadokawa Shoten", 2000000, 12);

// mencetak produk
$cetakProduk = new InfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetakInfo();