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
	<title>	DATA JADWAL SIDANG </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="header-user-dropdown.css">
<style>	
	.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
	.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<header class="header-user-dropdown">
	<div class="header-limiter">		
		<h1><a href="index.php">Pengadilan Negeri 1A Cilacap</h1></a>
		<nav>
			<a href="form_tambah.php">Input Jadwal Sidang</a>
			<a href="tambahtamu.php">Input tamu sidang</a>
			<a href="jadwal.php" target="_BLANK" rel="noopener noreferrer">View Jadwal sidang</a>
			
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
	
	<h3>Data Jadwal</h3>
	<div style="overflow: auto;">
		<table border="0" class="table" width=100%>
			<tr>
				<th>ID</th>
				<th>Jenis Perkara</th>
				<th>Persidangan perkara</th>
				<th>Tanggal</th>
				<th>Jam</th>
				<th>Ruangan</th>
				<th>Hakim ketua</th>
				<th>Terdakwa</th>
				<th>Penggugat</th>
				<th>Opsi</th>	
				
			</tr>
			<?php 
			$query = $con->query("SELECT * FROM detail_sidang");  
			$nomor = 1;
			while($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td align="center"><?php echo $data['id']?>.</td>
					<td><?php echo $data['jenis']; ?></td>
					<td><?php echo $data['perkara']; ?></td>
					<td><?php echo $data['tgl']; ?></td>
					<td><?php echo $data['jam']; ?></td>
					<td><?php echo $data['ruang']; ?></td>
					<td><?php echo $data['hakim']; ?></td>
					<td><?php echo $data['terdakwa']; ?></td>
					<td><?php echo $data['penggugat']; ?></td>
					<td width="150px" align="center">
						<a href="form_edit.php?id=<?php echo $data['id']; ?>"><button>Edit</button></a> 
						<a href="proses_hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data?')"><button>Hapus</button></a>					
						<a href="testamusidang.php?id=<?php echo $data['id']; ?>">
						<button id="myBtn">Tamu</button></a>	
					</td>
				
				</tr>
			<?php
			}
			?>
			
		</table>
	
	</div>
	<div>

	</div>
	<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>