<!-- UTILITY -->
<!-- var_dump() 
menampilkan informasi terstruktur dari value yang diberikan

var_dump(mixed $value, mixed ...$values): void

Parameters
value
    The expression to dump.
values
    Further expressions to dump.

Example #1 var_dump() example-->
<?php
$a = array(1, 2, array("a", "b", "c"));
var_dump($a);

// The above example will output:

// array(3) {
//   [0]=>
//   int(1)
//   [1]=>
//   int(2)
//   [2]=>
//   array(3) {
//     [0]=>
//     string(1) "a"
//     [1]=>
//     string(1) "b"
//     [2]=>
//     string(1) "c"
//   }
// }
echo "<br>";

$b = 3.1;
$c = true;
var_dump($b, $c);

// The above example will output:

// float(3.1)
// bool(true)
echo "<br>";
?>




<!-- empty()
Menentukan apakah suatu variabel kosong atau tidak

empty(mixed $var): bool

Parameter 
var
    Variabel yang akan diperiksa

    Tidak ada peringatan yang dihasilkan jika variabel tidak ada. Itu berarti empty() pada dasarnya setara dengan !isset($var) || $var == salah .
-->
<!-- Contoh 
Contoh #1 Perbandingan kosong() / isset() sederhana. -->

<?php
$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all' . "<br>";
}

// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set even though it is empty' . "<br>";
}
?>
<!-- Contoh #2 kosong() pada Offset String -->

<?php
$expected_array_got_string = 'somestring';
var_dump(empty($expected_array_got_string['some_key']));
echo "<br>";
var_dump(empty($expected_array_got_string[0]));
echo "<br>";
var_dump(empty($expected_array_got_string['0']));
echo "<br>";
var_dump(empty($expected_array_got_string[0.5]));
echo "<br>";
var_dump(empty($expected_array_got_string['0.5']));
echo "<br>";
var_dump(empty($expected_array_got_string['0 Mostel']));
echo "<br>";
?>
<!-- Contoh di atas akan menampilkan:

bool(benar) 
bool(salah) 
bool(salah) 
bool(salah) 
bool(benar) 
bool(benar) -->






<!-- sleep()
Menunda eksekusi


sleep( int $seconds ): int

Parameter
seconds
Hentikan waktu dalam detik (harus lebih besar dari atau sama dengan 0).
-->
<!-- Contoh 
Contoh #1 tidur() contoh -->

<?php

// current time
echo "Current time". "<br>" . date('h:i:s') . "<br>";

// sleep for 10 seconds
sleep(10);

// wake up !
echo "Wake up!". "<br>" . date('h:i:s') . "<br>";

?>
<!-- Contoh ini akan ditampilkan (setelah 10 detik)

05:31:23 
05:31:33 -->






<!-- die() atau setara dengan exit()
Mengeluarkan pesan dan menghentikan script ini

exit(string $status = ?): void
exit(int $status): void

Parameter 
status
    Jika statusberupa string, fungsi ini mencetak statustepat sebelum keluar.

    Jika intstatus , nilai itu akan digunakan sebagai status keluar dan tidak dicetak. Status keluar harus dalam kisaran 0 hingga 254, status keluar 255 dicadangkan oleh PHP dan tidak boleh digunakan. Status 0 digunakan untuk menghentikan program dengan sukses.
-->
<!-- Contoh 
Contoh #1 exitcontoh -->

<?php

$filename = 'C:\xampp\htdocs\00_materi_&_latihan_PHP\00_Sejarah&Pengertian_PHP.txt';
$file = fopen($filename, 'r')
    or exit("unable to open file ($filename)");

?>
<!-- Contoh #2 exitcontoh status -->

<?php

//exit program normally
// exit;
// exit();
// exit(0);

//exit with an error code
// exit(1);
// exit(0376); //octal

?>
<!-- Contoh #3 Fungsi Shutdown dan destruktor tetap berjalan -->

<?php
class Foo
{
    public function __destruct()
    {
        echo 'Destruct: ' . __METHOD__ . '()' . PHP_EOL;
    }
}

function shutdown()
{
    echo 'Shutdown: ' . __FUNCTION__ . '()' . PHP_EOL;
}

$foo = new Foo();
register_shutdown_function('shutdown');

//  Contoh di atas akan menampilkan:

// Shutdown: shutdown() 
//  Penghancuran: Foo::__destruct()
exit();
?>