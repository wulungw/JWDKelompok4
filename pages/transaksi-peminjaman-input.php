<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Transaksi Peminjaman</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php?p=transaksi-peminjaman">Transaksi Peminjaman</a></li>
					<li class="breadcrumb-item active">Transaksi Baru</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php
$sql = "SELECT idtransaksi FROM tbtransaksi ORDER BY idtransaksi DESC LIMIT 1";
$q_id_transaksi = mysqli_query($db, $sql);
$result = mysqli_fetch_array($q_id_transaksi);
?>

<div class="card">
	<div class="card-body">
		<form action="proses/transaksi-peminjaman-input-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_transaksi">ID Transaksi</label>
				<input type="text" class="form-control-plaintext" id="id_transaksi" name="id_transaksi" placeholder="ID Transaksi" readonly value="<?= ++$result['idtransaksi'] ?>">
			</div>
			<div class="form-group">
				<label for="id_anggota">Data Anggota</label>
				<select class="custom-select" name="id_anggota" id="id_anggota">
					<option value="#" hidden selected>Pilih Data Anggota..</option>

					<?php
					$q_tampil_anggota = mysqli_query(
						$db,
						"SELECT * FROM tbanggota
							WHERE status='Tidak Meminjam'
							ORDER BY idanggota"
					);

					while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) :
					?>
						<option value="<?= $r_tampil_anggota['idanggota'] ?>"><?= $r_tampil_anggota['idanggota'] . ' | ' . $r_tampil_anggota['nama'] ?></option>
					<?php endwhile; ?>

				</select>
				<div class="invalid-feedback" id="id_anggota_validasi"></div>
			</div>
			<div class="form-group">
				<label for="id_buku">Data Buku</label>
				<select class="custom-select" name="id_buku" id="id_buku">
					<option value="#" hidden selected>Pilih Data buku..</option>

					<?php
					$q_tampil_buku = mysqli_query(
						$db,
						"SELECT * FROM tbbuku
						WHERE status='Tersedia'
						ORDER BY idbuku"
					);

					while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) :
					?>
						<option value="<?= $r_tampil_buku['idbuku'] ?>"><?= $r_tampil_buku['idbuku'] . ' | ' .  $r_tampil_buku['judulbuku'] ?></option>
					<?php endwhile; ?>

				</select>
				<div class="invalid-feedback" id="id_buku_validasi"></div>
			</div>
			<div class="form-group">
				<label for="tgl_pinjam">Tanggal Peminjaman</label>
				<input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Tanggal Peminjaman">
				<div class="invalid-feedback" id="tgl_pinjam_validasi"></div>
			</div>
			<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>


<script type="text/javascript">
	const form = document.getElementById('form')

	form.addEventListener('submit', function(e) {
		const id_anggota = document.getElementById('id_anggota')
		if (id_anggota.value === '#') {
			isInvalid(id_anggota, 'id_anggota', 'Data anggota tidak boleh kosong')
			e.preventDefault();
		}

		const id_buku = document.getElementById('id_buku')
		if (id_buku.value === '#') {
			isInvalid(id_buku, 'id_buku', 'Data buku tidak boleh kosong')
			e.preventDefault();
		}

		const tgl_pinjam = document.getElementById('tgl_pinjam')
		if (tgl_pinjam.value === '') {
			isInvalid(tgl_pinjam, 'tgl_pinjam', 'Tanggal pinjam tidak boleh kosong')
			e.preventDefault();
		}

	})

	function isInvalid(selector, id, message) {
		selector.classList.add('is-invalid')
		document.getElementById(id + '_validasi').innerHTML = message
	}
</script>



<!-- <div id="label-page">
	<h3>Input Transaksi Peminjaman</h3>
</div>
<div id="content">
	<form action="proses/transaksi-peminjaman-input-proses.php" method="post">
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">ID Transaksi</td>
				<td class="isian-formulir"><input type="text" name="id_transaksi" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Anggota</td>
				<td class="isian-formulir">
					<select name="id_anggota" class="isian-formulir isian-formulir-border">
						<option value="" select="selected"> Pilih Data Anggota </option>
						<?php
						$q_tampil_anggota = mysqli_query(
							$db,
							"SELECT * FROM tbanggota
							WHERE status='Tidak Meminjam'
							ORDER BY idanggota"
						);
						while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
							echo "<option value=$r_tampil_anggota[idanggota]>$r_tampil_anggota[idanggota] | $r_tampil_anggota[nama]</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-formulir">Buku</td>
				<td class="isian-formulir">
					<select name="id_buku" class="isian-formulir isian-formulir-border">
						<option value="" select="selected"> Pilih Data Buku </option>
						<?php
						$q_tampil_buku = mysqli_query(
							$db,
							"SELECT * FROM tbbuku
							WHERE status='Tersedia'
							ORDER BY idbuku"
						);
						while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
							echo "<option value=$r_tampil_buku[idbuku]>$r_tampil_buku[idbuku] | $r_tampil_buku[judulbuku]</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label-formulir">Tanggal Pinjam</td>
				<td class="isian-formulir"><input type="text" name="tgl_pinjam" value="<?php echo $tgl; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
			</tr>
		</table>
	</form>
</div> -->