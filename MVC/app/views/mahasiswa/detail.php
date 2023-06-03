<div class="container-fluid mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <?= $data['mahasiswa']['nama'] ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">
                <?= $data['mahasiswa']['nis'] ?>
            </h6>
            <p class="card-text mb-0">
                <?= $data['mahasiswa']['jurusan'] ?>
            </p>
            <a href="mailto:<?= $data['mahasiswa']['email'] ?>"><?= $data['mahasiswa']['email'] ?></a>
            <a href="<?= BASEURL ?>mahasiswa" class="card-link mt-2">Back</a>
        </div>
    </div>
</div>