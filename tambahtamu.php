<?php
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah tamu | Web Pendataan</title>
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

	<h3>Input tamu</h3>
	<form action="proses_tambahtamu.php" method="post">		
		<table class="table" width=70%>
			<tr>
				<td>Nama Tamu</td>
				<td><input type="text" name="namatamu" required></td>					
			</tr>	
				<tr>
				<td>ID Sidang</td>
				<td>
				<select name='id'>
					 <?php
 
   $kon = mysqli_connect("localhost",'root',"","pengadilancilacap");
   if (!$kon){
      die("Koneksi database gagal:".mysqli_connect_error());
   }
	
 
    $sql="select * from detail_sidang";

    $hasil=mysqli_query($kon,$sql);
    $no=0;
    while ($data = mysqli_fetch_array($hasil)) {
    $no++;
   ?>
    <option value="<?php echo $data['id'];?>"><?php echo $data['id'];?></option>
  <?php 
	}
  ?>
				</select>
				</td>					
			</tr>
			<tr>
				<td>NIK</td>
				<td><input type="text" name="nik" required></td>					
			</tr>	
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" required></td>					
			</tr>	
			<tr>
				<td>Tamu sebagai</td>
				<td><input type="text" name="sebagai" required></td>					
			</tr>
			

				<td></td>
				<td><button type="submit">Simpan</button></td>					
			</tr>				
		</table>
	</form>
	
</body>
</html>

