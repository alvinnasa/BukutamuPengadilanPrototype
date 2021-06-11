<?php
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}

include "+koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Kendaraan | Web Pendataan</title>
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
			<a href="#"> View Data </a>
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
	
	<h3>Result tamu</h3>
	<?php
	
		$query = $con->prepare("SELECT * FROM tamu WHERE id = :id"); // tampil menggunakan method prepare
				
		$data = $query->fetch();
		?>		
		<table border="1" class="table">
		<tr>
				<th>ID Tamu</th>
				<th>ID Sidang</th>
				<th>Nama</th>
				<th>Nik</th>
				<th>Alamat</th>
				<th>Sebagai</th>
				<th>Opsi</th>		
		</tr>
		<tr>
				
					<td><?php echo $data['id_tamu']; ?></td>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['namatamu']; ?></td>
					<td><?php echo $data['nik']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td><?php echo $data['sebagai']; ?></td>
		</tr>					
		</table>