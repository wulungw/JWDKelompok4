<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Buku</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php?p=buku">Data Buku</a></li>
					<li class="breadcrumb-item active">Tambah Buku</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php
$sql = "SELECT idbuku FROM tbbuku ORDER BY idbuku DESC LIMIT 1";
$q_id_buku = mysqli_query($db, $sql);
$result = mysqli_fetch_array($q_id_buku);
?>

<div class="card">
	<div class="card-body">
		<form action="proses/buku-input-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_buku">ID Buku</label>
				<input type="text" class="form-control-plaintext" id="id_buku" name="id_buku" placeholder="ID Buku" readonly value="<?= ++$result['idbuku'] ?>">
			</div>
			<div class="form-group">
				<label for="judul_buku">Judul Buku</label>
				<input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku">
				<div class="invalid-feedback" id="judul_buku_validasi"></div>
			</div>
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="custom-select" name="kategori" id="kategori">
					<option value="#" hidden selected>Pilih Kategori..</option>
					<option value="Ilmu Komputer">Ilmu Komputer</option>
					<option value="Ilmu Agama">Ilmu Agama</option>
					<option value="Karya Sastra">Karya Sastra</option>
				</select>
				<div class="invalid-feedback" id="kategori_validasi"></div>
			</div>
			<div class="form-group">
				<label for="pengarang">Pengarang</label>
				<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang">
				<div class="invalid-feedback" id="pengarang_validasi"></div>
			</div>
			<div class="form-group">
				<label for="penerbit">Penerbit</label>
				<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
				<div class="invalid-feedback" id="penerbit_validasi"></div>
			</div>
			<button type="submit" name="simpan" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>


<script type="text/javascript">
	const form = document.getElementById('form')

	form.addEventListener('submit', function(e) {
		const judul_buku = document.getElementById('judul_buku')
		if (judul_buku.value === '') {
			isInvalid(judul_buku, 'judul_buku', 'Judul buku tidak boleh kosong')
			e.preventDefault();
		}

		const kategori = document.getElementById('kategori')
		if (kategori.value === '#') {
			isInvalid(kategori, 'kategori', 'Kategori tidak boleh kosong')
			e.preventDefault();
		}

		const pengarang = document.getElementById('pengarang')
		if (pengarang.value === '') {
			isInvalid(pengarang, 'pengarang', 'Pengarang tidak boleh kosong')
			e.preventDefault();
		}

		const penerbit = document.getElementById('penerbit')
		if (penerbit.value === '') {
			isInvalid(penerbit, 'penerbit', 'Penerbit tidak boleh kosong')
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