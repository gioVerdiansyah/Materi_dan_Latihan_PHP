<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman
        <?= (isset($data['title'])) ? $data['title'] : "Home" ?>
    </title>
    <link rel="stylesheet" href="<?= BASEURL ?>CSS/bootstrap.css">
</head>

<body data-url="<?= BASEURL ?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex flex-row align-items-center">
            <a class="navbar-brand" href="<?= BASEURL ?>">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>about">
                            About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>mahasiswa">
                            Mahasiswa</a>
                    </li>
                </ul>
                <div>
                    <h1 class="fs-3 m-0">Verdi</h1>
                </div>
            </div>
        </div>
    </nav>