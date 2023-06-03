<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data = ['title' => 'Daftar Mahasiswa:', 'mahasiswa' => $this->model('Mahasiswa_model')->getAllMahasiswa()];

        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

    public function detail($id)
    {
        $data = ['title' => 'Detail Mahasiswa:', 'mahasiswa' => $this->model('Mahasiswa_model')->getMahasiswaById($id)];

        $this->view('template/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('template/footer');
    }


    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }


    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }


    public function cari()
    {
        $data = ['title' => 'Daftar Mahasiswa:', 'mahasiswa' => $this->model('Mahasiswa_model')->cariAllMahasiswa()];

        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }
}