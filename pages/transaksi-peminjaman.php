<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Transaksi Peminjaman</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Transaksi Peminjaman</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<a href="index.php?p=transaksi-peminjaman-input" class="btn btn-primary" role="button">Transaksi Baru</a>

<div class="card mt-3">
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</td>
					<th>ID Transaksi</th>
					<th>ID Anggota</th>
					<th>Nama</th>
					<th>ID Buku</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT tbtransaksi.*,tbanggota.*,tbbuku.*
						FROM tbtransaksi,tbanggota,tbbuku
						WHERE tbtransaksi.idanggota=tbanggota.idanggota
						AND tbtransaksi.idbuku=tbbuku.idbuku
						AND tbtransaksi.tglkembali='0000-00-00'
						ORDER BY tbtransaksi.idtransaksi DESC";

				$q_transaksi = mysqli_query($db, $sql);

				$nomor = 1;
				while ($r_transaksi = mysqli_fetch_array($q_transaksi)) {
				?>
					<tr>
						<td><?= $nomor++; ?></td>
						<td><?= $r_transaksi['idtransaksi']; ?></td>
						<td><?= $r_transaksi['idanggota']; ?></td>
						<td><?= $r_transaksi['nama']; ?></td>
						<td><?= $r_transaksi['idbuku']; ?></td>
						<td><?= $r_transaksi['judulbuku']; ?></td>
						<td><?= $r_transaksi['tglpinjam']; ?></td>
						<td>
							<a href="cetak/nota-peminjaman.php?&id=<?= $r_transaksi['idtransaksi']; ?>" target="_blank" class="btn btn-info" role="button">Cetak Nota</a>
							<a href="proses/pengembalian-proses.php?&id=<?= $r_transaksi['idtransaksi']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin melakukan pengembalian?')">Pengembalian</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>



<!-- <div id="label-page">
	<h3>Transaksi Peminjaman</h3>
</div>
<div id="content">
	<p id="tombol-tambah-container"><a href="index.php?p=transaksi-peminjaman-input" class="tombol">Transaksi Baru</a></p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th id="label-opsi3">Opsi</th>
		</tr>
		<?php

		$sql = "SELECT tbtransaksi.*,tbanggota.*,tbbuku.*
		FROM tbtransaksi,tbanggota,tbbuku
		WHERE tbtransaksi.idanggota=tbanggota.idanggota
		AND tbtransaksi.idbuku=tbbuku.idbuku
		AND tbtransaksi.tglkembali='0000-00-00'
		ORDER BY tbtransaksi.idtransaksi DESC";

		$q_transaksi = mysqli_query($db, $sql);

		$nomor = 1;
		while ($r_transaksi = mysqli_fetch_array($q_transaksi)) {
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $r_transaksi['idtransaksi']; ?></td>
				<td><?php echo $r_transaksi['idanggota']; ?></td>
				<td><?php echo $r_transaksi['nama']; ?></td>
				<td><?php echo $r_transaksi['idbuku']; ?></td>
				<td><?php echo $r_transaksi['judulbuku']; ?></td>
				<td><?php echo $r_transaksi['tglpinjam']; ?></td>
				<td>
					<div class="tombol-opsi-container"><a href="cetak/nota-peminjaman.php?&id=<?php echo $r_transaksi['idtransaksi']; ?>" target="_blank" class="tombol">Cetak Nota</a></div>
					<div class="tombol-opsi-container"><a href="proses/pengembalian-proses.php?&id=<?php echo $r_transaksi['idtransaksi']; ?>" class="tombol">Pengembalian</a></div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div> -->