<!-- Abstract Class -->
<!-- 
    - Sebuah class yang tidak dapay di instansiasi (tetapi bisa di turunannya)
    - Mendefinisikan interface untuk class yang menjadi turunannya
    - Berperan sebagai 'kerangka dasar' untuk turunannya
    - Memiliki minimal 1 method abstarct (adalah interface atau kerangka untuk class turunannya)
    - Digunakan dalam 'pewarisan'/inheritance untuk 'memasksakan' implementasi method abstract yang sama untuk semua class turunannya (class abstarct bisa saja berisi kosong tetapi bisa kita isi pada turun-turunanya)
 -->

<!-- 
    Sebagai contoh tanpa menggunakan abstarct class adalah:
    Misal kita mmeiliki class Buah yang memiliki method makan
    dan memiliki turunan Apel dan Jeruk yang method makannya di isi dengan rasa buah tersebut
    Tapi saat kita mencoba instance Buah dan memanggil method makan maka rasa dari buah tersebut masih belum jelas

    Disinlah kita memerlukan abstract class agar method / property di dalam suatu class tidak perlu di instansiasi
  -->

<!-- Cara membuatnya adalah -->
<?php
abstract class Buah
{
    abstract public function makan(); //jadi fungsi ini akan di isi oleh class turunannya
}
class Mangga extends Buah
{
    public function makan()
    {
        return "Rasa Mangga";
    }
}
class Jeruk extends Buah
{
    public function makan()
    {
        return "Rasa Jeruk";
    }
}

$mangga = new Mangga;
echo $mangga->makan();

echo "<br>";

$jeruk = new Jeruk;
echo $jeruk->makan();


?>
<!-- 
    - Semua class turunannya harus mengimplementasikan method abstract yang ada di class abstract nya
    - Class abstract boleh memiliki property / method reguler
    - Class abstract boleh memiliki property / static method
 -->

<!-- 
    Kenapa menggunakan Abstarct Class?
    1.) Mempresentasikan ide / konsep dasar
    2.) "Composition over Inheritance" (Sebuah interface tidak perlu di instansiasi, kan agak aneh juga)
    3.) Salah satu cara menerapkan Polimorphism
    4.) Sentralisasi logic
    5.) Mempermudah bekerja dengan tim
  -->