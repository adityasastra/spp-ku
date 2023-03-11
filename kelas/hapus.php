<?php
include '../koneksi.php';
include '../helper/Kelas.php';
$id = $_GET['id'];
$kelas = new Kelas();

$kelas->hapus($id);
header('location: index.php'); 
die;
