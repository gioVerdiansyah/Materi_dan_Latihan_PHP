<?php

class Anime extends Produk implements DetailProduk
{
    public $jmlhEps;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlhEps = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->jmlhEps = $jmlhEps;
    }
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
    public function getInfoProduk()
    {
        $str = "Anime : " . $this->getInfo() . " - {$this->jmlhEps} eps.";
        return $str;
    }
}