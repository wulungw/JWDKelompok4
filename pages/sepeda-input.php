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
					<li class="breadcrumb-item active">Tambah Sepeda</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php
$sql = "SELECT idsepeda FROM tbsepeda ORDER BY idsepeda DESC LIMIT 1";
$q_id_sepeda = mysqli_query($db, $sql);
$result = mysqli_fetch_array($q_id_sepeda);

if (!$result) {
	$result['idsepeda'] = 'SP000';
}

?>

<div class="card">
	<div class="card-body">
		<form action="proses/sepeda-input-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_sepeda">ID Sepeda</label>
				<input type="text" class="form-control-plaintext" id="id_sepeda" name="id_sepeda" placeholder="ID Sepeda" readonly value="<?= ++$result['idsepeda'] ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Sepeda</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sepeda">
				<div class="invalid-feedback" id="nama_validasi"></div>
			</div>
			<div class="form-group">
				<label for="merek">Merek Sepeda</label>
				<input type="text" class="form-control" id="merek" name="merek" placeholder="Merek Sepeda">
				<div class="invalid-feedback" id="merek_validasi"></div>
			</div>
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="custom-select" name="kategori" id="kategori">
					<option value="#" hidden selected>Pilih Kategori..</option>
					<option value="Sepeda Gunung">Sepeda Gunung</option>
					<option value="Sepeda Hybrid">Sepeda Hybrid</option>
					<option value="Sepeda Balap">Sepeda Balap</option>
					<option value="Sepeda BMX">Sepeda BMX</option>
					<option value="Sepeda Lipat">Sepeda Lipat</option>
				</select>
				<div class="invalid-feedback" id="kategori_validasi"></div>
			</div>
			<div class="form-group">
				<label for="harga">Harga Rental</label>
				<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Rental">
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


<!-- <div id="label-page"><h3>Input Data Buku</h3></div>
<div id="content">
	<form action="proses/buku-input-proses.php" method="post">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><input type="text" name="judul_buku" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Kategori</td>
			<td class="isian-formulir">
				<select name="kategori" class="isian-formulir isian-formulir-border">
					<option value="" select="selected">~ Pilih Kategori ~</option>
					<option value="Ilmu Komputer">Ilmu Komputer</option>
					<option value="Ilmu Agama">Ilmu Agama</option>
					<option value="Karya Sastra">Karya Sastra</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">Pengarang</td>
			<td class="isian-formulir"><input type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div> -->