<?php

require 'refactoring/functions.php';

$id = $_GET["id"];//kita tangkap dahulu

if(del($id) > 0){
    echo "
    <script>
        alert('Data berhasil di hapus!');
        document.location.href = 'READ.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data gagal di hapus!');
        document.location.href = 'READ.php';
    </script>
    ";
}

?>