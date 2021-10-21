<?php
include'../koneksi.php';
$id_sepeda=$_GET['id'];

mysqli_query($db,
	"DELETE FROM tbsepeda
	WHERE idsepeda='$id_sepeda'"
);

header("location:../index.php?p=sepeda");
?>