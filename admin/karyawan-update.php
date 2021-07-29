<?php
    include_once('../koneksi.php');
    
    if (isset($_POST["update"])) {
    if ($koneksi->connect_errno == 0) {
        // Bersihkan data
        $id_karyawan = $koneksi->escape_string($_POST["id_karyawan"]);
        $nama_karyawan = $koneksi->escape_string($_POST["nama_karyawan"]);
        $posisi = $koneksi->escape_string($_POST["posisi"]);
        $password = $koneksi->escape_string($_POST["password"]);
        $no_hp = $koneksi->escape_string($_POST["no_hp"]);
        $alamat = $koneksi->escape_string($_POST["alamat"]);
        // Menyusun SQL
        $sql = "UPDATE karyawan SET nama_karyawan='$nama_karyawan',posisi='$posisi',password='$password',no_hp='$no_hp' WHERE id_karyawan='$id_karyawan'";
        $res = $koneksi->query($sql);
        if ($res) {
        if ($koneksi->affected_rows > 0) { // jika ada penambahan data
            echo "<script>alert('Data Berhasil disimpan')</script>"; 
            echo "<script>location='../admin/index.php';</script>";      
        }
        } else {
            echo "<script>alert('Data gagal tersimpan')</script>";
            echo "<script>location='../admin/index.php';</script>"; 
        }
        } else
            echo "<script>alert('Koneksi Database gagal')</script>";
            echo "<script>location='../admin/index.php';</script>";
        }     
?>