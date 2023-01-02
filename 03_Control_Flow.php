<!-- Control Flow / Struktur Kendali / Alur Program -->
<!-- umumnya Control Flow itu di baca oleh program dari atas ke bawah dari kiri ke kanan,
namun kita bisa mengubah alur program tersebut dengan 2 cara yaitu : -->

<!-- #Pengulangan -->
<!-- for while do... while foreach -->
<?php
// for
for ($i=0; $i < 3; $i++) {
    echo "For Loop ke-" . $i . "<br>";
}

// while
$a = 0;
while ($a <= 3) {
    echo "While ke-" . $a . "<br>";
    $a++;//jgn lupa increment/decrementnya njay
}

// do... while
$b = 0;
do {
    echo "do while ke-" . $b . "<br>";
    $b++;
} while ($b <= 3);
?>

<!-- untuk praktek simplenya di HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengulangan dan Pengkondisian</title>
</head>

<body>
    <!-- contoh khasus adalah mau membuat isi tabel (td) tapi sangat banyak, bahkan isinya hampir sama namun berulang-ulang-->

    <table border="1" cellpadding="5" cellspacing="0">
        <?php 
        // cara ke 1
        // for ($i=1; $i <= 3; $i++) {
        //     echo "<tr>";
        //     for ($a=1; $a <= 5 ; $a++) {
        //         echo "<td>$i . $a</td>";
        //     }
        //     echo "</tr>";
        // }
        // cara ke 2
        ?>
        <?php for ($i = 1; $i <= 3; $i++) : ?>
        <tr>
            <?php for ($a=1; $a <= 5 ; $a++) : ?>
            <td><?= $i .",". $a; ?></td>
            <?php endfor ?>
        </tr>
        <?php endfor ?>
        <!-- tidak masalah buka tutup tag php, kita jg bisa mengganti {} menjadi : lalu mengakhirinya dengan end lalu nama statementnya agar tidak membingungkan jika nanti sudah banyak -->
        <!-- NOTE jika kalian hanya memanggil nama variabel php nya saja didalam HTML maka kita bisa menggantinya menjadi: seperti di line 57 -->
    </table>
</body>

</html>
<!-- #Pengkondisian -->
<!-- if... else if... else if... else ternary switch -->
<!-- menentukan apa yang akan terjadi jika saat kita membuat sebuah pernyataan, dan jika bernilai true atau false maka apa yang akan terjadi -->
<?php
$x = 9;
$y = 9;
if ($x < $y) {
    echo "$x < $y ? = true";
}else if($x == $y){
    echo "$x == $y ? pas ditengah tengah";
}else{
    echo "$x < $y ? = false";
}
?>

<!-- latihan membuat tabel jika kondisi nomornya bernilai genap menampilkan warna -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengulangan dan Pengkondisian</title>
</head>

<body>
    <table border="1" cellpadding="5" cellspacing="0">
        ?>
        <?php for ($i = 1; $i <= 5; $i++) : ?>
        <tr>
            <?php for ($a=1; $a <= 15; $a++) : ?>
            <?php if ($i % 2 == 0 || $a % 2 == 0) : ?>
            <td bgcolor="#0f0f0f0"><?= $i .",". $a; ?></td>
            <?php else :?>
            <td bgcolor="#FF0000"><?= $i .",". $a; ?></td>
            <?php endif ?>
            <?php endfor ?>
        </tr>
        <?php endfor ?>
    </table>
</body>

</html>

<!-- ternary -->
<?php
$angkaA = 10;
$angkaB = 20;

$hasil = $angkaA <= $angkaB ? "ternary true" : "ternary false";
echo $hasil . "<br>";
?>


<!-- switch case -->
<?php
$nilai = "ABC";
switch ($nilai) {
    case 'A':
        echo "switch A";
        break;
    case "B":
        echo "switch B";
        break;
    default:
        echo "switch default atau else";
        break;
}
?>