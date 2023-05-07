<!-- Function adalah potongan program yang kita buat untuk mempermudah kita saat ngoding,
kode program tadi bisa kita kasih nama dan kita panggil berulang-ulang. Function itu sendiri
ada banyak jenis antara lain-->





<!-- #Built-in Function -->
<!-- di PHP sendiri terdapat banyak metode Built-in Function untuk mempermudah kita untuk lebih lengkapnya ada di link ini: http://php.net/manual/en/funcref.php 
yang nantinya sering kita akan gunakan adalah fungsi:-->
<!-- Date/Time
- time()
- date()
- mktime()
- strtotime() -->


<!-- date() -->
<?php
echo date("l, d-M-Y");// parameter l:hari d:tanggal M:nama bulan m:tanggal bulan Y:tahun, lengkap: https://www.php.net/manual/en/datetime.format.php 
echo "<br>";
?>


<!-- time() -->
<?php
echo time();
echo "<br>";
// mengapa ada banyak angka? dan kenapa setiap di refres berubah?
// itu adalah detik atau angka tersebut di sebut juga UNIX Timestamp atau EPOCH time
// Jadi ceritanya ini asal mula waktu di dunia komputer, angka tersebut merupakan detik yang sudah berlalu sejak 1 Januari 1970 sampai sekarang


// fungsi dari time ini banyak sekali misalnya untuk waktu diskon yang akan mendatang, atau bahkan mengetaui umur seseorang dari tanggal lahirnya

// untuk contoh kita akan membuat agar mengetahui 1000 hari kedepan dari sekarang:

echo date("l, d-M-Y", time()+60*60*24 * 1000);// sama aja menampilkan hari tapi dari waktu saat ini, namun dengan menggunakan time() ini saya bisa tahu untuk hari selanjutnya atau hari sebelumnya
// maka logikanya kita mencari detiknya dalam hari untuk mengetahui hari apa selanjutnya atau sebelumnnya
// 60*60*24 * 1000

// 100 adalah hari kedepan yang ingin kamu ketahui
// jadi bacanya adalah tampilkan hari saat ini ditambah sekian detik
// jika menghitung mundur tinggal ganti plus menjadi minus
echo "<br>";
?>
<!--  nah bagaimana jika ingin mengecek tanggal lahir kita
kita tidak menggunakan time() karena waktunya terbatas hanya sampai 1970 saja -->



<!-- mktime() membuat sendiri detik yang sudah berlalu -->
<?php
// argument mktime ada 6
// mktime(0,0,0,0,0,0);
// urutanya adalah jam, menit, detik, tanggal, bulan, tahun

echo mktime(0, 0, 0, 6, 24, 2007);//1182636000 maka ini adalah detik yang suda berlalu dari detik 0 menit 0 jam 0 dan awal bulan june tanggan 24 tahun 2007
echo "<br>";
// dan supaya tahu itu hari apa bagaimana? maktambahin aja date()
echo date("l",mktime(0, 0, 0, 6, 24, 2007));//Sunday, bener coooy
echo "<br>";
?>



<!-- strtotime ini adalah kebalikannya, kita memasukkan format tanggal nanti keluar detik -->
<?php
echo strtotime("24 jun 2007");
echo "<br>";
// jika kita masukkan kedalam date maka hasilnya sama seperti tadi
echo date("l",strtotime("24 jun 2007"));
?>




<!-- #User-Defined Function-->
<!-- yaitu fungsi yang kita buat sendiri -->
<!-- Aturanya adalah didefinisikan dahulu, yang tadi tidak didefinisikan karena itu suda miliknya php dan kita hanya memanggilnya -->

<!-- contoh kita akan membuat Function yang akan menampilkan selamat datang, Administrator, namun datangny mau saya ganti saat user mengunjungi pada web tersebut kapan misal malam, dan yang Administrator mau di ganti dengan nama user -->

<?php
function nama($waktu = "Datang",$namaMu = "Admin"){
    // $waktu = "Datang",$namaMu = "User" adalah nilai default jika user tidak mengisi argument
    return "Selamat $waktu, $namaMu"; 
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallo User</title>
</head>

<body>
    <p><?= nama("Malam") ?></p>
    <!-- bagaimana jika user memberi nilai arguments hanya satu atau bahkan tidak mengisi? Maka kita bisa mengisi nilai default -->
</body>

</html>