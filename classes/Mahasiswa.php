<?php
namespace Classes;
class Mahasiswa extends BaseModel {
    public function getAll() {
        return $this->conn->query("SELECT m.*, j.nama as jurusan, f.nama as fakultas FROM mahasiswa m JOIN jurusan j ON m.jurusan_id = j.id JOIN fakultas f ON j.fakultas_id = f.id")->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nama, jurusan_id) VALUES (?, ?)");
        return $stmt->execute([$data['nama'], $data['jurusan_id']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama = ?, jurusan_id = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['jurusan_id'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT m.*, j.nama as jurusan, f.nama as fakultas FROM mahasiswa m JOIN jurusan j ON m.jurusan_id = j.id JOIN fakultas f ON j.fakultas_id = f.id WHERE m.nama LIKE ?");
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll();
    }
}