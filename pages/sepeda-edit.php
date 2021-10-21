<?php
$id_sepeda = $_GET['id'];
$q_tampil_sepeda = mysqli_query($db, "SELECT * FROM tbsepeda WHERE idsepeda='$id_sepeda'");
$r_tampil_sepeda = mysqli_fetch_array($q_tampil_sepeda);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Sepeda</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php?p=sepeda">Data Sepeda</a></li>
					<li class="breadcrumb-item active">Edit Sepeda</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
	<div class="card-body">
		<form action="proses/sepeda-edit-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_sepeda">ID Sepeda</label>
				<input type="text" class="form-control-plaintext" id="id_sepeda" name="id_sepeda" placeholder="ID Sepeda" readonly value="<?= $r_tampil_sepeda['idsepeda'] ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Sepeda</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sepeda" value="<?= $r_tampil_sepeda['nama'] ?>">
				<div class="invalid-feedback" id="nama_validasi"></div>
			</div>
			<div class="form-group">
				<label for="merek">Merek Sepeda</label>
				<input type="text" class="form-control" id="merek" name="merek" placeholder="Merek Sepeda" value="<?= $r_tampil_sepeda['merek'] ?>">
				<div class="invalid-feedback" id="merek_validasi"></div>
			</div>
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="custom-select" name="kategori" id="kategori">
					<option value="#" hidden>Pilih Kategori..</option>
					<option value="Sepeda Gunung" <?php if ($r_tampil_sepeda['kategori'] === 'Sepeda Gunung') {
														echo 'selected';
													} ?>>Sepeda Gunung</option>
					<option value="Sepeda Hybrid" <?php if ($r_tampil_sepeda['kategori'] === 'Sepeda Hybrid') {
														echo 'selected';
													} ?>>Sepeda Hybrid</option>
					<option value="Sepeda Balap" <?php if ($r_tampil_sepeda['kategori'] === 'Sepeda Balap') {
														echo 'selected';
													} ?>>Sepeda Balap</option>
					<option value="Sepeda BMX" <?php if ($r_tampil_sepeda['kategori'] === 'Sepeda BMX') {
													echo 'selected';
												} ?>>Sepeda BMX</option>
					<option value="Sepeda Lipat" <?php if ($r_tampil_sepeda['kategori'] === 'Sepeda Lipat') {
														echo 'selected';
													} ?>>Sepeda Lipat</option>
				</select>
				<div class="invalid-feedback" id="kategori_validasi"></div>
			</div>
			<div class="form-group">
				<label for="harga">Harga Rental</label>
				<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Rental" value="<?= $r_tampil_sepeda['harga'] ?>">
				<div class="invalid-feedback" id="harga_validasi"></div>
			</div>
			<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>


<script type="text/javascript">
	const form = document.getElementById('form')

	form.addEventListener('submit', function(e) {
		const nama = document.getElementById('nama')
		if (nama.value === '') {
			isInvalid(nama, 'nama', 'Nama sepeda tidak boleh kosong')
			e.preventDefault();
		}

		const kategori = document.getElementById('kategori')
		if (kategori.value === '#') {
			isInvalid(kategori, 'kategori', 'Kategori tidak boleh kosong')
			e.preventDefault();
		}

		const merek = document.getElementById('merek')
		if (merek.value === '') {
			isInvalid(merek, 'merek', 'Merek sepeda tidak boleh kosong')
			e.preventDefault();
		}

		const harga = document.getElementById('harga')
		if (harga.value === '') {
			isInvalid(harga, 'harga', 'Harga rental tidak boleh kosong')
			e.preventDefault();
		} else if (harga.value < 100000) {
			isInvalid(harga, 'harga', 'Harga minimal 100.000')
			e.preventDefault();
		}

	})

	function isInvalid(selector, id, message) {
		selector.classList.add('is-invalid')
		document.getElementById(id + '_validasi').innerHTML = message
	}
</script>



<!-- <div id="label-page"><h3>Edit Data Buku</h3></div>
<div id="content">
	<form action="proses/buku-edit-proses.php" method="post">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_buku['idbuku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input type="text" name="judul_buku" value="<?php echo $r_tampil_buku['judulbuku']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Kategori</td>
			<td class="isian-formulir"><input type="text" name="kategori" value="<?php echo $r_tampil_buku['kategori']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><input type="text" name="pengarang" value="<?php echo $r_tampil_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><input type="text" name="penerbit" value="<?php echo $r_tampil_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div> -->