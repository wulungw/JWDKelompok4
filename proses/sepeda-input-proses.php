<?php
include'../koneksi.php';
$id_sepeda=$_POST['id_sepeda'];
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$merek=$_POST['merek'];
$harga=$_POST['harga'];
$status="Tersedia";
	
if(isset($_POST['simpan'])){
	mysqli_query($db,
		"INSERT INTO tbsepeda
		VALUES('$id_sepeda','$nama','$merek','$kategori','$harga','$status')"
	);
	header("location:../index.php?p=sepeda");
}
