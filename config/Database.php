<?php
namespace Config;
use PDO;
class Database {
    private $host = 'localhost';
    private $db = 'uas';
    private $user = 'root';
    private $pass = '';
    protected $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
    }

    public function getConnection() {
        return $this->conn;
    }
}