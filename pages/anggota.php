<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Anggota</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Data Anggota</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<a href="index.php?p=anggota-input" class="btn btn-primary" role="button">Tambah Anggota</a>

<div class="card mt-3">
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</td>
					<th>ID Anggota</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM tbanggota ORDER BY idanggota DESC";
				$q_tampil_anggota = mysqli_query($db, $sql);
				$nomor = 1;
				while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {

				?>
					<tr>
						<td><?= $nomor++; ?></td>
						<td><?= $r_tampil_anggota['idanggota']; ?></td>
						<td><?= $r_tampil_anggota['nama']; ?></td>
						<td><?= $r_tampil_anggota['jeniskelamin']; ?></td>
						<td><?= $r_tampil_anggota['alamat']; ?></td>
						<td>
							<a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="btn btn-info" role="button">Edit</a>
							<a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>