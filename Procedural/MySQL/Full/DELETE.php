<?php
// jika user belum login
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: Login.php");
    exit;
}
require 'functions.php';

$id = $_GET["id"]; //kita tangkap dahulu

if (del($id) > 0) {
    echo "
    <script>
        alert('Data berhasil di hapus!');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal di hapus!');
        document.location.href = 'index.php';
    </script>
    ";
}

?>