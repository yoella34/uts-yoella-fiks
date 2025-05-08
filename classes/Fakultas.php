<?php
namespace Classes;
class Fakultas extends BaseModel {
    public function getAll() {
        return $this->conn->query("SELECT * FROM fakultas")->fetchAll();
    }
}