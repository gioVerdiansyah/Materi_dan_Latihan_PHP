<?php
class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nis" => "01001010",
    //         "nama" => "Adi",
    //         "ahli" => "Front End dan Back End",
    //         "email" => "emailAdi@gmail.com"
    //     ],
    //     [
    //         "nis" => "01010010",
    //         "nama" => "Verdi",
    //         "ahli" => "Full Stack",
    //         "email" => "emailku@gmail.com"
    //     ],
    //     [
    //         "nis" => "01001010",
    //         "nama" => "Verdi Nich",
    //         "ahli" => "Back End",
    //         "email" => "verdiansyah@gmail.com"
    //     ]
    // ];



    // Mengambil data dari DataBase
    // private $dbh, $stmt; //DataBase Handler dan Statement

    // public function __construct()
    // {
    //     $dsn = 'mysql:host=localhost;dbname=phpmvc'; //Data Source Name

    //     // cek
    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }



    // inisialisai
    private $table = "mahasiswa", $db;


    // connect ke DB
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->allResult();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->oneResult();
    }


    // ! INSERT  Data
    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nis, :nama, :jurusan, :email)";
        $this->db->query($query);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    // ! DELETE DATA
    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // ! UPDATE
    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE " . $this->table . " SET nis=:nis, nama=:nama, jurusan=:jurusan, email=:email WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    // ! SEARCHING
    public function cariAllMahasiswa()
    {
        $key = $_POST['key'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :key";
        $this->db->query($query);
        $this->db->bind('key', "%$key%");

        return $this->db->allResult();
    }
}