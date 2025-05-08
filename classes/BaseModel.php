<?php
namespace Classes;
use Config\Database;

abstract class BaseModel {
    protected $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    abstract public function getAll();
}