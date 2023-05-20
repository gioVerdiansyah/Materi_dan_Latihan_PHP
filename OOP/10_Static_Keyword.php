<!-- Static keyword -->
<!-- 
    Dengan menggunakan static keyword kita bisa mengakses property dan method dalam konteks class
 -->

<?php
class ContohStatic
{
    public static $angka = 0;

    public static function pesan()
    {
        return "Hallo " . ++self::$angka . " kali";
    }
}

// $static = new ContohStatic();
// echo $static->pesan();
// ! Karena dalam class ContohStatic memiliki access property static maka kita tidak perlu instance lagi, kita bisa:

echo ContohStatic::$angka . "<br>";
echo ContohStatic::pesan() . "<br>";

echo "<hr>";

echo ContohStatic::pesan() . "<br>";

echo "<hr>";


// Kenapa menggunakan static?
// 1.) member yang terikat dengan class, bukan dengan object
// 2.) nilai akan selalu tetap meskipun object di-intansiasi berulang kali

// contoh

class Contoh
{
    public static $number = 1;

    public function getPesan()
    {
        return "Hallo " . self::$number++ . " kali" . "<br>";
    }
}

$contohStatic1 = new Contoh;
echo $contohStatic1->getPesan();
echo $contohStatic1->getPesan();
echo $contohStatic1->getPesan();

echo "<hr>";
// Jika tidak menggunakan static maka property angka akan diset ulang yakni 1
// Jika menggunakan static maka property akan akan tetap bertambah meski di instansiasi berkali-kali

$contohStatic2 = new Contoh;
echo $contohStatic2->getPesan();
echo $contohStatic2->getPesan();
echo $contohStatic2->getPesan();