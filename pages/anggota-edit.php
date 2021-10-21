<?php
$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Anggota</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php?p=anggota">Data Anggota</a></li>
					<li class="breadcrumb-item active">Edit Anggota</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">
	<div class="card-body">
		<form action="proses/anggota-edit-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_anggota">ID Anggota</label>
				<input type="text" class="form-control-plaintext" id="id_anggota" name="id_anggota" placeholder="ID Anggota" readonly value="<?= $r_tampil_anggota['idanggota']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $r_tampil_anggota['nama'] ?>">
				<div class="invalid-feedback" id="nama_validasi"></div>
			</div>
			<div class="form-group">
				<label for="jenis_kelamin">Jenis Kelamin</label>
				<select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
					<option value="#" hidden>Pilih Jenis Kelamin..</option>
					<option value="Pria" <?php if ($r_tampil_anggota['jeniskelamin'] === 'Pria') {
												echo 'selected';
											} ?>>Pria</option>
					<option value="Wanita" <?php if ($r_tampil_anggota['jeniskelamin'] === 'Wanita') {
												echo 'selected';
											} ?>>Wanita</option>
				</select>
				<div class="invalid-feedback" id="jenis_kelamin_validasi"></div>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"><?= $r_tampil_anggota['alamat'] ?></textarea>
				<div class="invalid-feedback" id="alamat_validasi"></div>
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
			isInvalid(nama, 'nama', 'Nama tidak boleh kosong')
			e.preventDefault();
		}

		const jenis_kelamin = document.getElementById('jenis_kelamin')
		if (jenis_kelamin.value === '#') {
			isInvalid(jenis_kelamin, 'jenis_kelamin', 'Jenis Kelamin tidak boleh kosong')
			e.preventDefault();
		}

		const alamat = document.getElementById('alamat')
		if (alamat.value === '') {
			isInvalid(alamat, 'alamat', 'Alamat tidak boleh kosong')
			e.preventDefault();
		}

	})

	function isInvalid(selector, id, message) {
		selector.classList.add('is-invalid')
		document.getElementById(id + '_validasi').innerHTML = message
	}
</script>

<!-- <div id="label-page"><h3>Edit Data Anggota</h3></div>
<div id="content">
	<form action="proses/anggota-edit-proses.php" method="POST">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Anggota</td>
			<td class="isian-formulir"><input type="text" name="id_anggota" value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama</td>
			<td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama 2</td>
			<td class="isian-formulir"><input type="text" name="name" value="" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Jenis Kelamin</td>
			<td class="isian-formulir"><input type="text" name="jenis_kelamin" value="<?php echo $r_tampil_anggota['jeniskelamin']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Alamat</td>
			<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_anggota['alamat']; ?></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div> -->