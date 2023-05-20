<!-- Constant -->
<!-- 
    Adalah sebuah identifier yang dapat menyimpan nilai, mirip dengan variabel pada umumnya namun nilai yang sudah kita set tidak dapat kita ubah

    Ada 2 cara syntax penggunaanya yaitu:
    define() dan const
 -->

<?php
//! define
define('NAMA_SAYA', 'Verdi');
echo NAMA_SAYA . "<br>";

//! const
const PANJANG = 145;
echo PANJANG;


echo "<br> <hr>";


// Perbedaan antara keduanya adalah jika define kita tidak bisa menggunakannya kedalam class sedangkan conts bisa

class Exam
{
    // define('NILAI', 89);//syntax error, unexpected identifier "define"
    const NILAI = 90;
}

echo Exam::NILAI; // Karena conts maka kita bisa mengaksesnya seperti static


echo "<br> <hr>";



//! Magic Constant
// Adalah Constanta yang sudah otomatis dibuatkan oleh PHP dan memiliki fungsinya sendiri sendiri
// __LINE__
// __FILE__
// __DIR__
// __FUNCTION
// __CLASS__
// __TRAIT__
// __METHOD__
// __NAMESPACE__

// dan masih ada banyak lagi
// Kita coba salah satu

echo __LINE__; // 51 karena kita sekarang berada di baris ke 51
echo "<br>";
echo __FILE__; // menampilkan alamat file ini
echo "<br>";
echo __DIR__; // menampilkan alamat directory ini
echo "<br>";

function getFunctionName()
{
    return __FUNCTION__; // menampilkan kita sedang berada di function apa? Jika tidak ada maka tidak akan menampilkan apa-apa
}
echo getFunctionName();


echo "<br>";

class Contoh
{
    public static function getClassName()
    {
        return __CLASS__; // menampilkan kita sedang berada di class apa
    }
}
echo Contoh::getClassName();


echo "<br>";

trait MyTrait
{
    public function getTraitName()
    {
        return __TRAIT__; // akan mengembalikan nama trait yakni MyTrait
    }
}

// contoh pemanggilannya
class UseTrait
{
    use MyTrait;
}
$obj = new UseTrait;
echo $obj->getTraitName();


echo "<br>";


class Method
{
    public static function getMethodName()
    {
        return __METHOD__; //mengembalikan nama didalam method ini yakni MeThod::getMethodName hasilnya akan sama meski kita intance tanpa menggunakan static
    }
}
echo Method::getMethodName();



// namespace MyNameSpace;
// echo __NAMESPACE__; // menampilkan nama namespace yang ada di file ini

//! namespace digunakan untuk mengelompokkan class, function, constanta agar tidak bentrok dengan file lainnya, namespae biasanya di deklarasi di line pertama