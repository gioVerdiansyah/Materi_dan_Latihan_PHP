<?php
session_start(); //memulai session
require "functions.php";
// cek COOKIE
if (isset($_COOKIE["UIuDSteKukki"]) && isset($_COOKIE["UNmeKySteKukki"])) {
    // cek dulu ada atau tidak
    $id = $_COOKIE["UIuDSteKukki"];
    $key = $_COOKIE["UNmeKySteKukki"];

    // cek username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM users WHERE id='$id'");
    $row = mysqli_fetch_assoc($result); //ambil

    // cek COOKIE dan username
    if ($key === hash("sha512", $row["username"])) {
        // key ini adalah username yang sudah di acak dan sekarang acak username baru berdasarkan isi rownya
        // jika benar maka bikin SESSION
        $_SESSION["login"] = true;
    }
}
// jika SESSION["login"] nya ada maka pindah ke index
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["submit"])) {
    // tampung
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    // cek apakah ada username yang di DB dengan username yang di inputkan? Jika ada maka akan cek Password-nya
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    // cek username-nya
    if (mysqli_num_rows($result) === 1) {
        // mysqli_num_rows() ini adalah fungsi untuk menghitung ada berapa baris yag dikembalikan dari fungsi SELECT, kalau ketemu nilainya 1 jika tidak 0

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["password"])) {
            // password_verify() merupakan kebalikan dari fungsi password_hash() yaitu mengecek sebuah string apakah cocok dengan hashnya, parameternya ada 2 yaitu String yang belum diacak(dari User) dan String yang sudah di acak( dari DB)

            // cek input checkbox Remember Me!
            if (isset($_POST["remember"])) {
                // buat COOKIE
                setcookie("UIuDSteKukki", $row["id"], time() + 60);
                setcookie("UNmeKySteKukki", hash("sha512", $row["username"]), time() + 60);
            }

            // cek session
            $_SESSION["login"] = true;
            // ini adalah yang akan kita cek di tiap-tiap halaman

            header("Location: index.php");
            exit;
            // arahkan ke suatu file dan exit untuk menghentikan program di bawah
        }

    }
    // jika salah:
    $err = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../../assets/favicomatic/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="../../assets/favicomatic/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/favicomatic/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="../../assets/favicomatic/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="../../assets/favicomatic/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="../../assets/favicomatic/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="../../assets/favicomatic/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="../../assets/favicomatic/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="../../assets/favicomatic/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
</head>

<body>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label><br>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password :</label><br>
                <input type="password" name="pass" id="password" required>
            </li>
            <li>
                <!-- COOKIE -->
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me!</label>
            </li>

            <!-- pesan kesalahan error -->
            <?php if (isset($err)): ?>
                <p style="color: red;margin:0;">Username atau Password salah!</p>
                <?php endif ?>

            <li style="margin: 5px 0;">
                <button type="submit" name="submit">Login!</button>
                <a href="registrasi.php">registrasi</a>
            </li>
        </ul>
    </form>
</body>

</html>