<?php

class Buku extends Produk implements DetailProduk
{
    public $jmlhHalaman;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlhHalaman = $jmlhHalaman;
    }
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
    public function getInfoProduk()
    {
        $str = "Buku : " . $this->getInfo() . " - {$this->jmlhHalaman} halaman.";
        return $str;
    }
}