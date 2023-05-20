<?php
abstract class Produk
    // karena syarat abstract class adalah memiliki minimal 1 abstract method maka ini sudah tidak bisa
{
    protected $judul, $penerbit, $harga, $penulis, $diskon = 0;

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
    abstract public function getInfo();


}