<!-- Class -->
<!-- 
+ Template untuk membuat instance dari object 
+ Class mendefinisikan Object
+ Menyimpan data dan prilaku (Property & Method)
 -->

<!-- Contoh Penggunaan -->

<?php
class Hello
{

}
?>

<!-- Object -->
<!-- 
+ Instance yang didefinisikan oleh Class
+ Bisa membuat banyak object hanya dengan satu Class
+ Object dibuat dengan keyword new
 -->

<?php

class Coba
{
}

$a = new Coba();
$b = new Coba();

var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";

var_dump(new Coba());
?>