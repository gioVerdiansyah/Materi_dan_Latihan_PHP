<!-- #Superglobals
variabel yang dimiliki oleh PHP, varibelnya adalah spesial
dan sebelum mempelajari Superglobals ini maka kita harus paham dahulu tentang 
-->
<!-- + Variabel Scope / lingkup variabel-->
<?php
// contoh:
$x = 10;//global
echo $x;
// nah ini adalah varibel yang bisa diakses oleh siapa saja atau disebut variabel global di file 10_GET&_POST.php
echo "<br>";


// contoh lagi:
function varX(){
    // echo $x. "<br>";//hanya bisa memanggil di local
}
varX();
echo $x;
// nah yang di eksekusi adalah var yang didalam function itu saja selain di dalam function maka tidak dapat di jangkau
echo "<br>". "<br>";
?>

<!-- nah gimana jika saya ingin mengakses varibel yang ada di luar function? Caranya: -->

<?php
// $x ==> $y
$y = 10;
echo $y;
echo "<br>";

function varY(){
    // caranya adalah memakai keyword global
    global $y; 
    echo $y . "<br>";
}
varY();
echo $y;
echo "<br>". "<br>";
?>





<!-- #Superglobals
ini adalah variabel-variabel yang sudah dimiliki oleh PHP dan dapat diakses dimanapun, variabel PHP memiliki ciri ciri dollar lalu underscore lalu namanya

Contohnya ada:
$_GET
$_POST
$_REQUEST
$_SESSION
$_COOKIE
$_ENV (environment)

dan semua varibel diatas adalah Array Associative dan memiliki juga prilaku ynag berbeda beda
-->

<?php
// isi arraynya apa? kita lihat :
var_dump($_GET);// hasilnya array(0) { }

// kosong, karena kita juga belum mengisi apapun

// dan ada yang sudah ada isinya misal $_SERVER
// nah kenapa banyak? Karena itu adalah informasi tentang server kita

echo "<br>";

// didalam itu ada banyak, dan bisa kita panggil dengan echo misal:

echo $_SERVER["SERVER_NAME"]
?>