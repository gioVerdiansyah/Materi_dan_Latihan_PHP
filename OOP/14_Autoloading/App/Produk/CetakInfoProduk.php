<?php
class CetakInfoProduk
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