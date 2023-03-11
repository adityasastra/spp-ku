<?php

class Siswa 
{
    public function semua()
    {
        global $koneksi;
        $sql = mysqli_query($koneksi, "SELECT * FROM siswa");
        $semua_siswa = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $semua_siswa;
    }

    public function ambil_id($id)
    {
        global $koneksi;
        $sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'");
        $siswa = mysqli_fetch_assoc($sql);
        return $siswa;
    }
}