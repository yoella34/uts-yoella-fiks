<?php
require_once '../config/Database.php';
require_once '../classes/BaseModel.php';
require_once '../classes/Mahasiswa.php';

use Classes\Mahasiswa;

$mhs = new Mahasiswa();
$keyword = $_GET['keyword'] ?? '';
$data = $mhs->search($keyword);
?>

<h2>Hasil Pencarian</h2>
<a href="index.php">← Kembali</a>
<table border="1" cellpadding="5">
    <tr><th>Nama</th><th>Jurusan</th><th>Fakultas</th><th>Aksi</th></tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['fakultas'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>