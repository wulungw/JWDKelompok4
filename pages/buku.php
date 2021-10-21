<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Buku</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Data Buku</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<a href="index.php?p=buku-input" class="btn btn-primary" role="button">Tambah Buku</a>

<div class="card mt-3">
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</td>
					<th>ID Buku</th>
					<th>Judul Buku</th>
					<th>Kategori</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM tbbuku ORDER BY idbuku DESC";
				$q_tampil_buku = mysqli_query($db, $sql);

				$nomor = 1;
				while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
				?>
					<tr>
						<td><?= $nomor++; ?></td>
						<td><?= $r_tampil_buku['idbuku']; ?></td>
						<td><?= $r_tampil_buku['judulbuku']; ?></td>
						<td><?= $r_tampil_buku['kategori']; ?></td>
						<td><?= $r_tampil_buku['pengarang']; ?></td>
						<td><?= $r_tampil_buku['penerbit']; ?></td>
						<td>
							<a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>" class="btn btn-info" role="button">Edit</a>
							<a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>



<!-- <div id="label-page">
	<h3>Tampil Data Buku</h3>
</div>
<div id="content">
	<p id="tombol-tambah-container"><a href="index.php?p=buku-input" class="tombol">Tambah Data Buku</a></p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th id="label-opsi2">Opsi</th>
		</tr>
		<?php

		$sql = "SELECT * FROM tbbuku ORDER BY idbuku DESC";
		$q_tampil_buku = mysqli_query($db, $sql);

		$nomor = 1;
		while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $r_tampil_buku['idbuku']; ?></td>
				<td><?php echo $r_tampil_buku['judulbuku']; ?></td>
				<td><?php echo $r_tampil_buku['kategori']; ?></td>
				<td><?php echo $r_tampil_buku['pengarang']; ?></td>
				<td><?php echo $r_tampil_buku['penerbit']; ?></td>
				<td>
					<div class="tombol-opsi-container"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>" class="tombol">Edit</a></div>
					<div class="tombol-opsi-container"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>" class="tombol">Hapus</a></div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div> -->