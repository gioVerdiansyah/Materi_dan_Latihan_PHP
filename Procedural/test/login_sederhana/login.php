<?php
    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        // cek username & password
    if ($_POST["username"] == "admin" && $_POST["pass"] == "01010010") {
        // jika benar maka redirect ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        // jika salah  maka tampilkan pesan kesalahan
        $err = true;
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Admin</title>
</head>

<body>
    <p>Login Admin</p>
    <ul>
        <form action="" method="post">
            <!-- jangan gunakan method GET jika saat membuat login -->
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <!-- for label dan id input harus sama agar bisa saling berhubungan -->
            </li>
            <li>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass">
            </li>
            <li>
                <button type="submit" name="submit">Send</button>
            </li>
            <?php if (isset($err)) :?>
            <!-- jika username atau pass salah --->
            <p style="color: red;">Username / Password salah!</p>
            <?php endif ?>
        </form>
    </ul>
</body>

</html>