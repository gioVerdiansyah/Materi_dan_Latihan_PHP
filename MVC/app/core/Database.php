<?php
class Database
{
    private $host = DB_HOST, $user = DB_USER, $pass = DB_PASS, $db_name = DB_NAME, $dbh, $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // cek
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // menjalankan query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding Data
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    // jika ingin menampilkan banyak data
    public function allResult()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function oneResult()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Di database apakah ada yang berubah?
    public function rowCount()
    {
        return $this->stmt->rowCount(); //ini punya PDO
    }
}