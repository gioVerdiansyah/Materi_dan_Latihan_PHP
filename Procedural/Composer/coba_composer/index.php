<?php
# When installed via composer
require_once '../vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create("id_ID"); //object dengan nama nama orang indo, untuk melihatnyaa ada di C:\xampp\htdocs\Composer\vendor\fzaninotto\faker\test\Faker\Provider
// dan jika kosong maka default-nya adalah US

// contoh penggunaan
echo $faker->name; //random nama

for ($i = 1; $i <= 10; $i++) {
    echo $faker->name . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Penduduk</h1>
    <?php for ($i = 1; $i <= 10; $i++): ?>
    <ul>
        <li><?= $faker->name ?></li>
        <li>
            <?= $faker->address ?>
        </li>
        <li><?= $faker->email ?></li>
    </ul>
    <?php endfor; ?>
</body>

</html>