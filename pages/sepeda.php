<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Sepeda</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Data Sepeda</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<a href="index.php?p=sepeda-input" class="btn btn-primary" role="button">Tambah Sepeda</a>

<div class="card mt-3">
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</td>
					<th>ID Sepeda</th>
					<th>Nama Sepeda</th>
					<th>Merek</th>
					<th>Kategori</th>
					<th>Harga Rental</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM tbsepeda ORDER BY idsepeda DESC";
				$q_tampil_sepeda = mysqli_query($db, $sql);

				$nomor = 1;
				while ($r_tampil_sepeda = mysqli_fetch_array($q_tampil_sepeda)) {
				?>
					<tr>
						<td><?= $nomor++; ?></td>
						<td><?= $r_tampil_sepeda['idsepeda']; ?></td>
						<td><?= $r_tampil_sepeda['nama']; ?></td>
						<td><?= $r_tampil_sepeda['merek']; ?></td>
						<td><?= $r_tampil_sepeda['kategori']; ?></td>
						<td><?= "Rp " . number_format($r_tampil_sepeda['harga'], 0, ',', '.'); ?></td>
						<td>
							<a href="index.php?p=sepeda-edit&id=<?= $r_tampil_sepeda['idsepeda']; ?>" class="btn btn-info" role="button">Edit</a>
							<a href="proses/sepeda-hapus.php?id=<?= $r_tampil_sepeda['idsepeda']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>