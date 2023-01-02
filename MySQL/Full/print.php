<!-- file ini akan menjalankan fungsi mPDF -->
<?php
require_once __DIR__ . '/vendor/autoload.php';
require "functions.php";
$siswa = query(
    "SELECT * FROM siswa_rpl ORDER BY id ASC"
);


$html = '
<h1>Daftar Siswa RPL</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>';
$i = 1;
foreach ($siswa as $row) {
    $html .= '<tr class="value">
        <td>' . $i++ . '</td>
        <td><img src="../../assets/TEMP/' . $row["gambar"] . '" width="50"  height="50"></td>
        <td>' . $row["nis"] . '</td>
        <td>' . $row["nama"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["jurusan"] . '</td>
        </tr>';
}

$html .= '</table>
<link rel="stylesheet" href="style-cetak.css">
';


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("daftar_siswa_RPL.pdf", "I");