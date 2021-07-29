<?php
    include_once('../koneksi.php');
    
    if (isset($_POST["update"])) {
    if ($koneksi->connect_errno == 0) {
        // Bersihkan data
        $id_produk = $koneksi->escape_string($_POST["id_produk"]);
        $nama_produk = $koneksi->escape_string($_POST["nama_produk"]);
        $harga_produk = $koneksi->escape_string($_POST["harga_produk"]);
        $id_kategori = $koneksi->escape_string($_POST["id_kategori"]);
        // Menyusun SQL
        $sql = "UPDATE barang SET nama_produk='$nama_produk',harga_produk='$harga_produk',id_kategori='$id_kategori' WHERE id_produk='$id_produk'";
        $res = $koneksi->query($sql);
        if ($res) {
        if ($koneksi->affected_rows > 0) { // jika ada penambahan data
            echo "<script>alert('Data Berhasil disimpan!')</script>"; 
            echo "<script>location='../admin/index2.php';</script>";      
        }
        } else {
            echo "<script>alert('Data gagal tersimpan!')</script>";
            echo "<script>location='../admin/index2.php';</script>"; 
        }
        } else
            echo "<script>alert('Koneksi Database gagal!')</script>";
            echo "<script>location='../admin/index2.php';</script>";
        }     
?>