<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>


    <div class="row data-indicator">
        <!-- insert data -->
        <div class="col-lg-6 d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary add" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data mahasiswa
            </button>

            <!-- Search data -->
            <form class="d-flex m-0" role="search" method="post" action="<?= BASEURL ?>mahasiswa/cari">
                <input class="form-control me-2" type="search" name="key" id="key" placeholder="Cari Nama Mahasiswa"
                    aria-label="Search" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h1 class="mt-1">Daftar Mahasiswa: </h1>
            <?php foreach ($data['mahasiswa'] as $mahasiswa): ?>
                <ul class="list-group mt-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mahasiswa['nama'] ?>
                        <div>
                            <a class="btn btn-primary p-2 me-4"
                                href="<?= BASEURL ?>mahasiswa/detail/<?= $mahasiswa['id'] ?>" role="button">Detail
                            </a>
                            <a class="btn btn-success p-2 me-4 update"
                                href="<?= BASEURL ?>mahasiswa/ubah/<?= $mahasiswa['id'] ?>"
                                data-id="<?= $mahasiswa['id'] ?>" role="button" data-bs-toggle="modal"
                                data-bs-target="#formModal">Update
                            </a>
                            <a class="btn btn-danger p-2" href="<?= BASEURL ?>mahasiswa/hapus/<?= $mahasiswa['id'] ?>"
                                role="button"
                                onclick="return confirm('apakah anda yakin ingin menghapus data mahasiswa <?= $mahasiswa['nama'] ?>')">Hapus
                            </a>
                        </div>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id" id="inputHidden">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nis" class="form-label mt-3">NIS</label>
                        <input class="form-control" id="nis" type="number" name="nis" placeholder="NIS Mahasiswa"
                            max="9" aria-label="default input example" required>

                        <label for="nama" class="form-label  mt-3">Nama</label>
                        <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Mahasiswa"
                            aria-label="default input example" required>

                        <label for="jurusan" class="form-label  mt-3">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example"
                            required>
                            <option value="RPL" selected>RPL</option>
                            <option value="TKR">TKR</option>
                            <option value="TO">TO</option>
                            <option value="TBSM">TBSM</option>
                            <option value="APHP">APHP</option>
                        </select>

                        <label for="email" class="form-label  mt-3">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="emailmahasiswa@gmail.com" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>