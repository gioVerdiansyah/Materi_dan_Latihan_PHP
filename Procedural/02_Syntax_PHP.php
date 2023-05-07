<!-- tag php :-->
<?php

?>


<!-- komentar -->
<?php
// ini komentar satu baris

/* ini komentar
banyak
baris
*/
?>


<!-- standar output -->
<?php
echo "mencetak tulisan atau variabel dll <br>";
print "mencetak tulisan atau variabel dll <br>";
print_r("bisa tulisan tapi di khususkan untuk mencetak isi array <br>");//khusus digunakan untuk mencetak isi array
var_dump("biasa digunakan untuk melihat isi variabel dan ada berapa isi stringnya <br>");//biasanya digunakan untuk melihat isi dari variabel

// semua var diatas biasanya digunakan untuk debugging, yang paling cocok adalah print_r dan var_dump
?>


<!-- karakteristik tipe data dengan echo -->
<?php
echo 123 . "<br>"; //Number tak perlu string
echo "Hallo Verdi <br>"; //String memerlukan kutip 2 atau 1
echo true . "<br>"; //Boolean true menghasilkan angka 1
echo false . "<br>"; //Boolean false meghasilkan output kosong

?>
<!-- NOTE" kutip dua "" lebih sakti dari pada kutip satu '' -->



<!-- penulisan syntax dalam PHP -->
<!-- 1. PHP dalam HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Hallo user, ini
        <?php echo "adalah:"; ?>
    </p>
    <?php
echo "penulisan PHP dalam HTML"
    ?>
</body>

</html>

<!-- 2. HTML dalam PHP (tidak di sarankan!)-->
<?php
echo "<p>Penulisan HTML dalam PHP</p>";
?>


<!-- Tipe data dan variabel -->
<!-- variabel (aturannya mirip di JS tetapi jangan menggunakan symbol strip - karena nanti dikira ini adalah operator aritmatika)-->
<?php
$iniVariabel = "isi variabel";
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <p>ini adalah <?php echo $iniVariabel; ?></p>
    <!-- nah lebih kepake walau masih agak merepotkan -->
</body>

</html>

<!-- kutip dua lebih sakti kenapa? karena kita bisa menggunakan konsep yang namanya interpolasi, interpolasi sendiri adalah untuk mengecek apakah didalam kutip dua atau string terdapat variabel atau engga, jika ada variabel maka yang ditampilkan adalah isi variabelnya-->
<!-- contoh konsep interpolasi: -->
<?php
$interpolasi = "interpolasi";
echo "Hallo ini adalah konsep $interpolasi menggunakan kutip dua <br>";
// ini jika menggunakan kutip 2, jika menggunakan kutip satu maka:
echo 'Hallo ini adalah konsep $interpolasi menggunakan kutip satu <br>';
// tidak jalan
?>

<!-- operator -->
<!-- aritmatika -->
<!-- () * ** / + - dan % (sisa bagi atau modulo)-->
<?php
echo (10 + 5 - 3) * 5 ** 5 / 10 . "<br>";
echo 100 % 3 . "<br>";
?>

<!-- penggabung string (concatenation) -->
<!-- Concat di PHP adalah titik . sedangkan di JS adalah plus + , jadi ya beda lah yaa... -->
<?php
$nama_depan = "Sofyan";
$nama_belakang = "Verdi";

echo "Hallo nama saya adalah " . $nama_depan . $nama_belakang . "<br>";
?>

<!-- Assignment (penugasan)-->
<!-- sebenarnya kita sudah memakainya, sama seperti di variabel -->
<!-- = += -= *= /= %= .= -->
<?php
$x = 1;
$x = 5;//menimpa
$x += 2;// var x ditambah ditambah samadengan 2
echo $x . "<br>";
// bisa coba coba sendiri yang - * /

$nama = "Verdi";//nah umpama saya ngk mau menggabungkan seperti di line 112, maka saya bisa
$nama .= "ansyah" . "<br>";
echo $nama;
?>

<!-- Perbandingan -->
<!-- < > <= >= == !=(tidak samadengan) -->
<!-- biasanya digunakan pada pengkondisian, untuk lebih simplenya kita menggunakan var_dump untuk mengeceknya -->
<?php
var_dump(1 < 2); /* akan menghasilkan nilai boolean */
echo "<br>";
var_dump(2 == "2");// tetap true karena samadengan dua kali tidak membandingkan identitas
// jika ingin membandingkan identitas maka harus menggunakan operator identitas
echo "<br>";
?>

<!-- identitas -->
<!-- === !== -->
<?php
var_dump(2 === "2");
echo "<br>";
?>

<!-- Logika -->
<!-- && || ! -->
<!-- AND OR NOT -->
<?php
var_dump(5 < 2 && 5 > 2);// AND ini jika salah satunya ada false maka semuanya menjadi false meski ada kondisi yang benar
echo "<br>";
var_dump(10 < 20 || 10 % 2 == 0);// OR ini kebalikannya
echo "<br>";
var_dump(!(2 < 5));// true namun karena menggunakan operator NOT menjadi false
// NOT ini mengembalikan nilai yang tadinya true atau false menjadi kebalikannya