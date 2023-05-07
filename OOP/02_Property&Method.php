<!-- 
    Property
    + Variabel yang ada didalam object disebut member variabel
    + Sama seperti variabel pada umumnya namun didepannya ditambah visibility(public, private, protected)

    Method
    + Mempresentasikan prilaku dari sebuah object
    + Sama seperti function pada umumnya namun didepannya ditambah visibility(boleh tidak pake namun visibility defaultnya adalah public, disarankan memakai agar tidak membingungkan)
    

    Ilustrasi:
    Property
        nama,merk,warna,kecepatanMaksimal,jumlahPenumpang
    Method
        tambahKecepatan,kurangiKecepatan,gantiTransmisi,belokKiri,belokKanan
 -->

<?php
class Mobil
{
    public $nama;
    public $merk;
    public $warna;
    public $kecepatanMaksumal;
    public $jumlahpenumpang;


    public function tambahKecepatan()
    {
    }
    public function kurangiKecepatan()
    {
    }
    public function gantiTransmisi()
    {
    }
    public function belokKiri()
    {
    }
    public function belokKanan()
    {
    }

}
class Produku
{
    public $judul = "Filosofi Teras", $penulis, $penerbit, $harga;

    public function sayHello($nama)
    {
        return "Hello $nama!";
    }
    public function getLabel()
    {
        // global $penulis; kalau pakai global mengarah ke luarnya saja bukan menerima inputan dari object yang dipanggil

        return "$this->penulis";
        // berbeda dengan this yang menerima inputan dari obejct yang dipanggil maupun diluar jika tidak dipanggil
    }
}
$produk1 = new Produku();
$produk1->harga = 12000;
var_dump($produk1);

echo "<br>";

$produk2 = new Produku();
$produk2->judul = "WOTB";
var_dump($produk2->judul);

//! menambah property yang belum ada didalam class
// $produk2->kategori = "action";
// var_dump($produk2);


echo "<br>";


// Menimpa semua isi yang ada di class Produk
$produk3 = new Produku();
$produk3->judul = "Sebuah Seni Untuk Bersikap Bodo Amat";
$produk3->penulis = "Mark Manson";
$produk3->penerbit = "PT. Gramedia Widiasarana Indonesia (Grasindo).";
$produk3->harga = 35000;
var_dump($produk3);

// contoh penggunaan untuk label
echo "<br> Judul Buku: $produk3->judul <br>";

// memanggil method
echo $produk3->sayHello("Verdi");
echo "<br> Label: " . $produk3->getLabel();