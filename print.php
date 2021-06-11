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
	<link href='https://yukcoding.blogspot.com/favicon.ico' rel='icon' type='image/x-icon'/>
	<link rel="stylesheet" href="header-user-dropdown.css">
</head>
<body>
	<header class="header-user-dropdown">
	<div class="header-limiter">		
		<h1>Pengadilan Negeri 1A Cilacap</h1>
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

		<?php
		$id = $_GET['id'];
		$query = $con->prepare("SELECT * FROM tamu WHERE id = :id"); 
		$query->bindValue(':id', $id); 
		$query->execute();
		$data = $query->fetch();
	
		?>		
		Surat Keterangan Tamu Pengadilan Negeri 1A Cilacap
		<table border="0" class="table" width=70%>
				<tr>
				<td>ID Tamu :</td>
				<td><?php echo $data['id_tamu']; ?></td>
				</tr>
				<tr>
				<td>ID Sidang :</td>
				<td><?php echo $data['id']; ?></td>
				</tr>
				<tr>
				<td>Nama :</td>
				<td><?php echo $data['namatamu']; ?></td>
				</tr>
				<tr>
				<td>Nik :</td>
				<td><?php echo $data['nik']; ?></td>
				</tr>
				<tr>
				<td>Alamat :</td>
				<td><?php echo $data['alamat']; ?></td>
				</tr>
				<tr>
				<td>Sebagai :</td>
				<td><?php echo $data['sebagai']; ?></td>
				</tr>
			
		<?php
		$id = $_GET['id'];
		$query = $con->prepare("SELECT * FROM detail_sidang WHERE id = :id"); 
		$query->bindValue(':id', $id); 
		$query->execute();
		$data = $query->fetch();
		?>
		
			<tr>
				<td>Sidang perkara :</td>
				<td><?php echo $data['perkara']; ?></td>
			</tr>
			
		
		</table>
		<script>
		window.print();
	</script>
</body>
</html>
