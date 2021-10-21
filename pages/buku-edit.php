<?php
$id_buku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
?>

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
					<li class="breadcrumb-item active">Edit Buku</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
	<div class="card-body">
		<form action="proses/buku-edit-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_buku">ID Buku</label>
				<input type="text" class="form-control-plaintext" id="id_buku" name="id_buku" placeholder="ID Buku" readonly value="<?= $r_tampil_buku['idbuku'] ?>">
			</div>
			<div class="form-group">
				<label for="judul_buku">Judul Buku</label>
				<input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku" value="<?= $r_tampil_buku['judulbuku'] ?>">
				<div class="invalid-feedback" id="judul_buku_validasi"></div>
			</div>
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select class="custom-select" name="kategori" id="kategori">
					<option value="#" hidden>Pilih Kategori..</option>
					<option value="Ilmu Komputer" <?php if ($r_tampil_buku['kategori'] === 'Ilmu Komputer') {
														echo 'selected';
													} ?>>Ilmu Komputer</option>
					<option value="Ilmu Agama" <?php if ($r_tampil_buku['kategori'] === 'Ilmu Agama') {
													echo 'selected';
												} ?>>Ilmu Agama</option>
					<option value="Karya Sastra" <?php if ($r_tampil_buku['kategori'] === 'Karya Sastra') {
														echo 'selected';
													} ?>>Karya Sastra</option>
				</select>
				<div class="invalid-feedback" id="kategori_validasi"></div>
			</div>
			<div class="form-group">
				<label for="pengarang">Pengarang</label>
				<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang" value="<?= $r_tampil_buku['pengarang'] ?>">
				<div class="invalid-feedback" id="pengarang_validasi"></div>
			</div>
			<div class="form-group">
				<label for="penerbit">Penerbit</label>
				<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" value="<?= $r_tampil_buku['penerbit'] ?>">
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