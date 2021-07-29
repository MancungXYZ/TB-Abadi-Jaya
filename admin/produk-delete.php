<?php
include_once('../koneksi.php');
 
//jika benar mendapatkan GET id dari URL
if (isset($_GET['id_produk'])){
	//membuat variabel
	$produk = $_GET['id_produk'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_produk='$produk'");
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id_produk='$produk'");
		if($delete) {
			echo '<script>alert("Berhasil menghapus data!."); 
				  document.location="../admin/index2.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data!."); 
				  document.location="../admin/index2.php";</script>';
		}
	}else{
		echo '<script>alert("produk tidak ditemukan di database!.");
			  document.location="../admin/index2.php";</script>';
	}
}else{
	echo '<script>alert("koneksi tidak ditemukan di database!."); 
		 document.location="../admin/index2.php";</script>';
}
 
?>