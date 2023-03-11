<?php
include '../koneksi.php';

include '../helper/Pembayaran.php';
$id = $_GET['id'];
$pembayaran = new Pembayaran();

$pembayaran->hapus($id);
header('location: index.php');
die;