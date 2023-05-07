<!-- STRING -->

<!-- strlen() 
String Length, menghitung string
parameter 1 String!
-->
<?php
$str = "abcdef";
echo strlen($str);//6

echo "<br>";

$str = "ab cde ";
echo strlen($str);//7 Karena juga menghitung spasi
echo "<br>";
?>



<!-- strcmp()
String Compare, membandingkan sebuah String
Parameter 2 String
-->
<?php
$var1 = "verdi";
$var2 = "vwerdi";

echo strcmp($var1, $var2) . "<br>";//Fungsi ini mengembalikan nilai -1, 1, dan 0 jika sama

if (strcmp($var1, $var2) !== 0) {
    echo '$var1 is not equal to $var2 in a case sensitive string comparison';
}else{
    echo '$var1 is equal to $var2';
}
echo "<br>";
?>


<!-- explode() 
Memecah sebuah string menjadi array
explode ( string $separator , string $string , int $limit=PHP_INT_MAX ): array
Mengembalikan array string, yang masing-masing merupakan substring dari yang stringdibentuk dengan memisahkannya pada batas yang dibentuk oleh string separator.

Parameter
#separator
    Tali pembatas.

#string
    Rangkaian masukan.

#limit
    - Jika limitdisetel dan positif, larik yang dikembalikan akan berisi maksimum limitelemen dengan elemen terakhir berisi sisa string.

    - Jika limitparameternya negatif, semua komponen kecuali yang terakhir - limitdikembalikan.

    - Jika limitparameternya nol, maka ini diperlakukan sebagai 1.
-->

<?php
// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0] . "<br>"; // piece1
echo $pieces[1] . "<br>"; // piece2

// Example 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user . "<br>"; // foo
echo $pass . "<br>"; // *



// Example #2 explode() return examples
$input1 = "hello";
$input2 = "hello,there";
$input3 = ',';
var_dump( explode( ',', $input1 ) );
echo "<br>";
var_dump( explode( ',', $input2 ) );
echo "<br>";
var_dump( explode( ',', $input3 ) );
echo "<br>";
// The above example will output:
// array(1)
// (
//     [0] => string(5) "hello"
// )
// array(2)
// (
//     [0] => string(5) "hello"
//     [1] => string(5) "there"
// )
// array(2)
// (
//     [0] => string(0) ""
//     [1] => string(0) ""
// )




// Example #3 limit parameter examples
$str = 'one|two|three|four';

// positive limit
print_r(explode('|', $str, 3));
echo "<br>";
// negative limit
print_r(explode('|', $str, -2));
// The above example will output:

// Array
// (
//     [0] => one
//     [1] => two|three|four
// )
// Array
// (
//     [0] => one
//     [1] => two
//     [2] => three
// )


// Setelah saya pelajari dan ulik ulik ternyata fungsi sebenarnya adalah menghilangkan suatu Stirng tertentu
// namun berbeda dengan limit, jika limit = 2 maka isi array yang pertama akan dipisahkan lalu dipanggil dan yang sisanya akan dipisahkan bersamaan dan dipanggil, urutan pemisahannya berlaku juga dari isi limit yang diberikan
// lalu jika yang negatif, semua isi array akan di pisahkan lalu di panggil kecuali isi array terakhir, urutan isi array terkahir ini juga ditentukan dari limit yang disebutkan
echo "<br>";
?>



<!-- htmlspecialchars() 
Mengkonversi tag HTML menjadi string atau symbol tertentu
ini berguna jika saat ada user yang memasukkan input berupa tag program maka htmlspecialchars ini akan merubahkan menjadi string dan kode program yang di input user tidak akan dijalankan

htmlspecialchars (
     string $string ,
     int $flags= ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401 ,
     ? string $encoding=null ,
     bool $double_encode=true
): string



Karakter	            Penggantian
&(simbol untuk 'dan)	&amp;
"(kutipan ganda)	    &quot;, kecuali ENT_NOQUOTESdiatur
'(kutipan tunggal)	    &#039;(untuk ENT_HTML401) atau &apos;(untuk ENT_XML1, ENT_XHTMLatau ENT_HTML5), tetapi
                        hanya jika ENT_QUOTESdiset
<(kurang dari)	        &lt;
>(lebih besar dari)     &gt;



string
String sedang dikonversi .

flags
Bitmask dari satu atau beberapa flag berikut, yang menentukan cara menangani tanda kutip, urutan unit kode yang tidak valid, dan tipe dokumen yang digunakan. Standarnya adalah ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401.

flagsKonstanta yang tersedia
Nama Konstan	        Keterangan
ENT_COMPAT	            Akan mengonversi tanda kutip ganda dan membiarkan tanda kutip tunggal.

ENT_QUOTES	            Akan mengonversi tanda kutip ganda dan tunggal.

ENT_NOQUOTES	        Akan membiarkan tanda kutip ganda dan tunggal tidak dikonversi.

ENT_IGNORE	            Buang urutan unit kode yang tidak valid secara diam-diam alih-alih mengembalikan string
                        kosong. Penggunaan flag ini tidak disarankan karena » mungkin memiliki implikasi keamanan .
ENT_SUBSTITUTE	        Ganti urutan unit kode yang tidak valid dengan Karakter Pengganti Unicode U+FFFD (UTF-8)
                        atau � (jika tidak) alih-alih mengembalikan string kosong.

ENT_DISALLOWED	        Ganti poin kode yang tidak valid untuk jenis dokumen yang diberikan dengan Karakter
                        Pengganti Unicode U+FFFD (UTF-8) atau � (sebaliknya) alih-alih membiarkannya apa adanya. Ini mungkin berguna, misalnya, untuk memastikan format dokumen XML yang baik dengan konten eksternal yang disematkan.
                        
ENT_HTML401	            Tangani kode sebagai HTML 4.01.
ENT_XML1	            Tangani kode sebagai XML 1.
ENT_XHTML	            Menangani kode sebagai XHTML.
ENT_HTML5	            Tangani kode sebagai HTML 5.
-->
<?php
$contohChars = "<h4>Test</h4>";
echo $contohChars;
// echo htmlspecialchars($contohChars, ENT_COMPAT) . "<br>";
echo htmlspecialchars($contohChars, ENT_QUOTES) . "<br>";
// echo htmlspecialchars($contohChars, ENT_NOQUOTES) . "<br>";
// echo htmlspecialchars($contohChars, ENT_IGNORE) . "<br>";
// echo htmlspecialchars($contohChars, ENT_SUBSTITUTE) . "<br>";
// echo htmlspecialchars($contohChars, ENT_DISALLOWED) . "<br>";
// echo htmlspecialchars($contohChars, ENT_HTML401) . "<br>";
// echo htmlspecialchars($contohChars, ENT_XML1) . "<br>";
// echo htmlspecialchars($contohChars, ENT_XHTML) . "<br>";
// echo htmlspecialchars($contohChars, ENT_HTML5) . "<br>";
?>