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
	<a href="index.php">
		<button>< Lihat Semua Data</button>
	</a>
	
	<h3></h3>
	<form action="proses_edit.php" method="post">
		<?php
		$id = $_GET['id'];

		$query = $con->prepare("SELECT * FROM detail_sidang WHERE id = :id");  
		$query->bindValue(':id', $id);  
		$query->execute();
		$data = $query->fetch();
		?>		
		<table>
			<tr>
				<td>Jenis Perkara</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
					<input type="text" name="jenis" value="<?php echo $data['jenis'] ?>" required>
				</td>					
			</tr>	
			<tr>
				<td>Persidangan perkara</td>
				<td><input type="text" name="perkara" value="<?php echo $data['perkara'] ?>" required></td>					
			</tr>	
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tgl" value="<?php echo $data['tgl'] ?>" required></td>					
			</tr>	
			<tr>
				<td>Jam</td>
				<td><input type="time" name="jam" value="<?php echo $data['jam'] ?>" required></td>					
			</tr>
			<tr>
				<td>Ruangan</td>
				<td><input type="text" name="ruang" value="<?php echo $data['ruang'] ?>" required></td>					
			</tr>	
			<tr>
				<td>Hakim ketua</td>
				<td><input type="text" name="hakim" value="<?php echo $data['hakim'] ?>" required></td>					
			</tr>
			<tr>
				<td>Tergugat</td>
				<td><input type="text" name="terdakwa" value="<?php echo $data['terdakwa'] ?>" required></td>					
			</tr>
			<tr>
				<td>Penggugat</td>
				<td><input type="text" name="penggugat" value="<?php echo $data['penggugat'] ?>" required></td>					
			</tr>
			
				<td></td>
				<td><button type="submit">Simpan</button></td>				
			</tr>				
		</table>
	</form>
</body>
</html>

