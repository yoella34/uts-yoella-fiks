<?php
namespace Classes;
class Jurusan extends BaseModel {
    public function getAll() {
        return $this->conn->query("SELECT * FROM jurusan")->fetchAll();
    }
}