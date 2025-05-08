<?php
use Classes\Mahasiswa;
use Classes\Jurusan;

require_once '../config/Database.php';
require_once '../classes/BaseModel.php';
require_once '../classes/Mahasiswa.php';
require_once '../classes/Jurusan.php';

$jurusan = new Jurusan();
$dataJurusan = $jurusan->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jurusan_id = $_POST['jurusan_id'];

    $mhs = new Mahasiswa();
    $mhs->create([
        'nama' => $nama,
        'jurusan_id' => $jurusan_id
    ]);

    header('Location: index.php');
    exit;
}
?>

<form method="POST">
    Nama: <input type="text" name="nama"><br>
    Jurusan:
    <select name="jurusan_id">
        <?php foreach($dataJurusan as $j): ?>
            <option value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Tambah</button>
</form>