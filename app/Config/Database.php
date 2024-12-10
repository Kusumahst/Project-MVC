<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "admin_project";
    private ?mysqli $conn = null;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection(): ?mysqli {
        if ($this->conn === null) {
            try {
                $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

                if ($this->conn->connect_error) {
                    throw new Exception("Koneksi Gagal: " . $this->conn->connect_error);
                }
            } catch (Exception $e) {
                echo "Connection error: " . $e->getMessage();
                $this->conn = null; 
            }
        }
        return $this->conn;
    }
}
?>
