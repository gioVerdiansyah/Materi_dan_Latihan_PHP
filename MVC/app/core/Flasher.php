<?php
class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        // tipe ini adalah tipe seperti warna dari bootstrap
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // eksekusi flash messagenya
    public static function flash()
    {
        // cek apakah ada sesi flash yang di atas? Jika ada maka tampilkan pesannya
        if (isset($_SESSION['flash'])) {
            echo '
        <div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Data Mahasiswa:
            <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }

        // Jika sudah ditampilkan sekali maka hapus sesi flash ini
        unset($_SESSION['flash']);
    }
}