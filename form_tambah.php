<?php
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kendaraan | Web Pendataan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="header-user-dropdown.css">
</head>
<body>
	<header class="header-user-dropdown">
	<div class="header-limiter">		
		<h1><a href="index.php">Pengadilan Negeri 1A Cilacap</h1></a>
		<nav>
			<a href="form_tambah.php">Input Jadwal Sidang</a>
			<a href="tambahtamu.php">Input tamu sidang</a>
			<a href="jadwal.php">View Jadwal sidang</a>
			<a href="#"> Validasi tamu </a>
		</nav>

		<div class="header-user-menu">
			Hi! <?=$_SESSION['username']?>
			<ul>
				<li><a href="logout.php" class="highlight">Logout</a></li>
			</ul>
		</div>
	</div>

	<br />
	
	</header>
	<br />
	<a href="index.php">
		<button>< Lihat Semua Data</button>
	</a>

	<h3>Input Persidangan Baru</h3>
	<form action="proses_tambah.php" method="post">		
		<table  width=70% class="table">
			<tr>
				<td>Jenis Perkara:</td>
				<td><input type="text" name="jenis" required></td>					
			</tr>	
			<tr>
				<td>Persidangan Perkara:</td>
				<td><input type="text" name="perkara" required></td>					
			</tr>	
			<tr>
				<td>Tanggal:</td>
				<td><input type="date" name="tgl" required></td>					
			</tr>	
			<tr>
				<td>Jam:</td>
				<td><input type="time" name="jam" required></td>					
			</tr>
			<tr>
				<td>Ruangan:</td>
				<td><input type="text" name="ruang" required></td>					
			</tr>	
			<tr>
				<td>Hakim ketua:</td>
				<td><input type="text" name="hakim" required></td>					
			</tr>
			<tr>
				<td>Penggugat:</td>
				<td><input type="text" name="penggugat" required></td>					
			</tr>
			<tr>
				<td>Terdakwa:</td>
				<td><input type="text" name="terdakwa" required></td>					
			</tr>

				<td></td>
				<td><button type="submit">Simpan</button></td>					
			</tr>				
		</table>
	</form>
	
</body>
</html>

