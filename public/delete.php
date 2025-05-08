<?php
require_once '../config/Database.php';
require_once '../classes/BaseModel.php';
require_once '../classes/Mahasiswa.php';

use Classes\Mahasiswa;

$id = $_GET['id'];
$mhs = new Mahasiswa();
$mhs->delete($id);
header("Location: index.php");
exit;