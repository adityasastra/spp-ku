<?php

class Transaksi
{
    public function semua()
    {
        global $koneksi;
        $sql = mysqli_query($koneksi, "SELECT * FROM transaksi");
        $semua_transaksi = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $semua_transaksi;
    }

   public function ambil_bulan_sudah_dibayar($id_siswa, $tahun_ajaran)
   {
        global $koneksi;
        $sql = mysqli_query($koneksi, "SELECT bulan_dibayar FROM transaksi INNER JOIN pembayaran ON pembayaran.id = transaksi.pembayaran_id WHERE siswa_id = '$id_siswa' AND tahun_ajaran = '$tahun_ajaran'");
        $bulan_dibayar = mysqli_fetch_array($sql, MYSQLI_NUM);
        return $bulan_dibayar;
   }

   public function tambah($data)
   {
        global $koneksi;
        $tanggal_bayar = $data['tanggal_bayar'];
        $bulan_dibayar = $data['bulan_dibayar'];
        $tahun_dibayar = $data['tahun_dibayar'];
        $siswa_id = $data['siswa_id'];
        $petugas_id = $data['id'];
        $pembayaran_id = $data['pembayaran_id'];
        $sql = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, '$tanggal_bayar', '$bulan_dibayar', '$tahun_dibayar','$siswa_id','$petugas_id','$pembayaran_id')");
   }
}