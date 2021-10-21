<?php
include'../koneksi.php';

$id_sepeda=$_POST['id_sepeda'];
$nama=$_POST['nama'];
$kategori=$_POST['kategori'];
$merek=$_POST['merek'];
$harga=$_POST['harga'];

If(isset($_POST['simpan'])){
	mysqli_query($db,
		"UPDATE tbsepeda
		SET nama='$nama',kategori='$kategori',merek='$merek',harga='$harga'
		WHERE idsepeda='$id_sepeda'"
	);
	header("location:../index.php?p=sepeda");
}
