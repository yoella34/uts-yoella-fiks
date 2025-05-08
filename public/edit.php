<?php
require_once '../config/Database.php';
require_once '../classes/BaseModel.php';
require_once '../classes/Mahasiswa.php';

use Classes\Mahasiswa;

$id = $_GET['id'];
$mhs = new Mahasiswa();
$row = $mhs->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mhs->update($id, [
        'nama' => $_POST['nama'],
        'jurusan_id' => $_POST['jurusan_id']
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Mahasiswa</h2>
<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $row['nama'] ?>"><br>
    Jurusan ID: <input type="number" name="jurusan_id" value="<?= $row['jurusan_id'] ?>"><br>
    <button type="submit">Update</button>
</form>