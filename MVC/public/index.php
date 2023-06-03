<?php
if (!session_id()) {
    session_name('sesiBelajarPHPMVC');
    session_start();
}

// ! Boostaraping
require "../app/init.php";

// ! Instance
$app = new App;
?>