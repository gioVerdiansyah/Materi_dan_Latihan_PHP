<!-- unset() 
Hapus variabel yang diberikan

unset( mixed $var , mixed ...$vars ): void
Parameter 
var
    Variabel yang tidak disetel.

vars
    Variabel lebih lanjut.
-->
<!-- Jika variabel global tidak disetel () di dalam suatu fungsi, hanya variabel lokal yang dihancurkan. Variabel di lingkungan panggilan akan mempertahankan nilai yang sama seperti sebelum unset() dipanggil. -->

<?php
function destroy_foo() 
{
    global $foo;
    unset($foo);
}

$foo = 'bar';
destroy_foo();
echo $foo . "<br>";
?>
<!-- Contoh di atas akan menampilkan:

batang
Untuk menghapus() variabel global di dalam fungsi, gunakan array $GLOBALS untuk melakukannya: -->

<?php
function zoo() 
{
    unset($GLOBALS['bar']);
}

$bar = "something";
zoo();
?>
<!-- Jika variabel yang DIBERIKAN OLEH REFERENSI adalah unset() di dalam suatu fungsi, hanya variabel lokal yang dihancurkan. Variabel di lingkungan panggilan akan mempertahankan nilai yang sama seperti sebelum unset() dipanggil. -->

<?php
function poo(&$bar) 
{
    unset($bar);
    $bar = "blah";
}

$bar = 'something';
echo "$bar\n" . "<br>";

poo($bar);
echo "$bar\n" . "<br>";
?>
<!-- Contoh di atas akan menampilkan: -->

<!-- sesuatu 
sesuatu
Jika variabel statis unset() di dalam suatu fungsi, unset() menghancurkan variabel hanya dalam konteks fungsi lainnya. Panggilan berikut akan mengembalikan nilai variabel sebelumnya. -->

<?php
function koo()
{
    static $bar;
    $bar++;
    echo "Before unset: $bar, " . "<br>";
    unset($bar);
    $bar = 23;
    echo "after unset: $bar\n" . "<br>";
}

koo();
koo();
koo();
?>
<!-- Contoh di atas akan menampilkan:

Sebelum di-unset: 1, setelah di-unset: 23 
Sebelum di-unset: 2, setelah di-unset: 23 
Sebelum di-unset: 3, setelah di-unset: 23 -->



<!-- Contoh #1 unset() contoh -->

<?php
// destroy a single variable
$kesatu = "satu";
unset($kesatu);

// destroy a single element of an array
$arey = array("verdi","quux","muux",123,true);
unset($arey['quux']);


// destroy more than one variable
$satu = "tutu";
$dua = "wawa";
$tiga = "gaga";
$empat = "patpat";
unset($satu, $dua, $tiga);
?>
<!-- Contoh #2 Menggunakan (unset)casting

(unset) casting sering bingung dengan unset() fungsi. (unset) casting hanya berfungsi sebagai NULL-type cast, untuk kelengkapan. Itu tidak mengubah variabel yang dilemparkannya. Pemeran (tidak disetel) tidak digunakan lagi pada PHP 7.2.0, dihapus pada 8.0.0. -->

<?php
// $name = 'Felipe';

// var_dump((unset) $name);
// var_dump($name);
?>
<!-- Contoh di atas akan menampilkan:

NULL 
string(6) "Felipe" -->




<!-- isset() 
menentukan apakah variabel di deklarasikan dan berbeda dari NULL

isset(mixed $var, mixed ...$vars): bool

Parameters 
var
    The variable to be checked.

vars
    Further variables.
-->

<!-- Examples
Example #1 isset() Examples -->

<?php

$var = '';

// This will evaluate to TRUE so the text will be printed.
if (isset($var)) {
    echo "var has no contents" . "<br>";
}else{
    echo "var has contents" . "<br>";
}

// In the next examples we'll use var_dump to output
// the return value of isset().

$a = "test";
$b = "anothertest";

var_dump(isset($a));      // TRUE
echo "<br>";
var_dump(isset($a, $b)); // TRUE
echo "<br>";
unset ($a);

var_dump(isset($a));     // FALSE
echo "<br>";
var_dump(isset($a, $b)); // FALSE
echo "<br>";

$foo = NULL;
var_dump(isset($foo));   // FALSE
echo "<br>";

?>
<!-- This also work for elements in arrays: -->

<?php

$a = array ('test' => 1, 'hello' => NULL, 'pie' => array('a' => 'apple'));

var_dump(isset($a['test']));            // TRUE
echo "<br>";
var_dump(isset($a['foo']));             // FALSE
echo "<br>";
var_dump(isset($a['hello']));           // FALSE
echo "<br>";

// The key 'hello' equals NULL so is considered unset
// If you want to check for NULL key values then try: 
var_dump(array_key_exists('hello', $a)); // TRUE
echo "<br>";

// Checking deeper array values
var_dump(isset($a['pie']['a']));        // TRUE
echo "<br>";
var_dump(isset($a['pie']['b']));        // FALSE
echo "<br>";
var_dump(isset($a['cake']['a']['b']));  // FALSE
echo "<br>";

?>
<!-- Example #2 isset() on String Offsets -->

<?php
$expected_array_got_string = 'somestring';
var_dump(isset($expected_array_got_string['some_key']));
echo "<br>";
var_dump(isset($expected_array_got_string[0]));
echo "<br>";
var_dump(isset($expected_array_got_string['0']));
echo "<br>";
var_dump(isset($expected_array_got_string[0.5]));
echo "<br>";
var_dump(isset($expected_array_got_string['0.5']));
echo "<br>";
var_dump(isset($expected_array_got_string['0 Mostel']));
echo "<br>";
?>
<!-- The above example will output:

bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false) -->