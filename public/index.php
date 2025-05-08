<?php
require_once '../config/Database.php';
require_once '../classes/BaseModel.php';
require_once '../classes/Mahasiswa.php';

use Classes\Mahasiswa;

$mhs = new Mahasiswa();
$data = $mhs->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa - Sistem Informasi Kampus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2e86de;
            color: white;
            padding: 20px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        header img {
            height: 60px;
        }
        main {
            padding: 30px;
            max-width: 900px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e0e0e0;
        }
        a {
            color: #2e86de;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .actions a {
            margin-right: 10px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-form input {
            padding: 8px;
            width: 200px;
        }
        .btn {
            background-color: #2e86de;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #1b4f72;
        }
    </style>
</head>
<body>
    <header>
        <img src="../assets/images/logo-aub.png" alt="Logo AUB">
        <div>
            <h1 style="margin: 0;">Sistem Informasi Mahasiswa</h1>
            <p style="margin: 0;">Universitas Dharma AUB Surakarta by yoella_b</p>
        </div>
    </header>
    <main>
        <div class="top-bar">
            <a href="tambah.php" class="btn">+ Tambah Data</a>
            <form class="search-form" method="GET" action="search.php">
                <input type="text" name="keyword" placeholder="Cari nama...">
                <button type="submit" class="btn">Cari</button>
            </form>
        </div>

        <table>
            <tr>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td><?= htmlspecialchars($row['fakultas']) ?></td>
                <td class="actions">
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>
