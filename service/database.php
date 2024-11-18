<?php
class Database {
    private $host = 'localhost';    
    private $db_name = 'sistema_login'; 
    private $username = 'root';         
    private $password = '';             
    private $conn;

    public function __construct() {
        $this->conn = null;
    }
    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
            }
        }
        return $this->conn;
    }
}
?>
