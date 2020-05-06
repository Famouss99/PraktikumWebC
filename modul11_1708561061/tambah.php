<?php

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	/*enctype untuk memanggil variabel super global $_FILE */

	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
		<script>
				alert('Data gagal ditambahkan!');
				document.location.href = 'index.php';
		</script>

		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
	<link rel="stylesheet" href="style.css" type="text/css" class="stylesheet">
</head>

<body>
	<div class="page">
		<div class="header">

		</div>
		<div class="tabel">
			<h1>Tambah Data Mahasiswa</h1>
			<form class="form" action="" method="post" enctype="multipart/form-data">
				<table>
					<thead>
						<tr>
							<td>
								<h2>Nama</h2>
							</td>
							<td><input type="text" name="nama" placeholder="Masukkan Nama Anda" id="nama" required></td>
						</tr>
						<tr>
							<td>
								<h2>NIM</h2>
							</td>
							<td><input type="text" name="nim" placeholder="Masukkan NIM Anda" id="nim" required></td>
						</tr>
						<tr>
							<td>
								<h2>Email</h2>
							</td>
							<td><input type="text" name="email" placeholder="Masukkan Email Anda" id="email"></td>
						</tr>
						
						<tr>
							<td><input type="submit" class="btn" value="Selesai" name="submit"></td>
						</tr>
					</thead>
				</table>
			</form>
		</div>
	</div>

</body>

</html>