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
					<li class="breadcrumb-item active">Tambah Anggota</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php
$sql = "SELECT idanggota FROM tbanggota ORDER BY idanggota DESC LIMIT 1";
$q_id_anggota = mysqli_query($db, $sql);
$result = mysqli_fetch_array($q_id_anggota);
?>

<div class="card">
	<div class="card-body">
		<form action="proses/anggota-input-proses.php" method="POST" id="form">
			<div class="form-group">
				<label for="id_anggota">ID Anggota</label>
				<input type="text" class="form-control-plaintext" id="id_anggota" name="id_anggota" placeholder="ID Anggota" readonly value="<?= ++$result['idanggota'] ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				<div class="invalid-feedback" id="nama_validasi"></div>
			</div>
			<div class="form-group">
				<label for="jenis_kelamin">Jenis Kelamin</label>
				<select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
					<option value="#" hidden selected>Pilih Jenis Kelamin..</option>
					<option value="Pria">Pria</option>
					<option value="Wanita">Wanita</option>
				</select>
				<div class="invalid-feedback" id="jenis_kelamin_validasi"></div>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat"></textarea>
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


<!-- <div id="content">
	<form action="proses/anggota-input-proses.php" method="post">
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">ID Anggota</td>
				<td class="isian-formulir"><input type="text" name="id_anggota" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Nama</td>
				<td class="isian-formulir"><input type="text" name="nama" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Jenis Kelamin</td>
				<td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="Pria">Pria</label></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="Wanita">Wanita</td>
			</tr>
			<tr>
				<td class="label-formulir">Alamat</td>
				<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"></textarea></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
			</tr>
		</table>
	</form>
</div> -->