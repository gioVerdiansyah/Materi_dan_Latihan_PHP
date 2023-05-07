<?php
session_start();
// jika user sudah login
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require "functions.php";

$massage = "";

if (isset($_POST["submit"])) {
    global $massage;
    if (register($_POST) === 1) {
        // fungsi register berhasil dan ada user yang berhasil masuk 0 dari mysqli_affected_rows
        $massage = "<p style='color:green;margin:0;'>register berhasil! <a href='Login.php'>Login?</a></p>";
    } else {
        global $massage;
        $error = $_SESSION["error"];
        $massage = "<p style='color:red;margin:0;'>register gagal karena $error</p>";
    }
}
// $massage ini untuk mencetak pesan 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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
<form action="" method="post">
    <ul>
        <li> <label for="username">Username :</label><br>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="pass">Password :</label><br>
            <input type="password" name="pass" id="pass" required>
        </li>
        <li>
            <label for="confirmPass">Confirmation Password :</label><br>
            <input type="password" name="confirmPass" id="confirmPas" required>
        </li>
        <?php echo $massage; ?>

        <li style="margin: 5px 0;">
            <button type="submit" name="submit">Sign Up</button>
            <a href="Login.php">Login?</a>
        </li>
    </ul>
</form>

<body>

</body>

</html>