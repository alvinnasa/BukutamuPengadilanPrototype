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
		.kbw-signature {
			width: 100px;
			height: 100px;
		}

		.crop{
				zoom : 50%;
				margin : 25px 25px 25px 25px;
		}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
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
			<a href="listtamu.php"> Validasi tamu </a>
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
		<a href="index.php">
		<button>
			< Lihat Semua Data</button>
	</a>
	<h3>Data Tamu </h3>


	
	<div style="overflow: auto;">
		<table border="0" class="table" width=100%>
			<tr>
			<th>ID Tamu</th>
			<th>ID Sidang</th>
			<th>Nama</th>
			<th>Nik</th>
			<th>Alamat</th>
			<th>Sebagai</th>
			<th width="300">tanda tangan </th>
			<th width="200px">Opsi</th>

		</tr>
		<tr>
			<?php
			
			$id = $_GET['id'];
            if(isset($_GET['id'])){
				$query = $con->query("SELECT * FROM tamu WHERE id = '".$id."' ");
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
				<td><?php echo $data['id_tamu']; ?></td>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['namatamu']; ?></td>
				<td><?php echo $data['nik']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['sebagai']; ?></td>
				<td><div class="crop"><?php echo $data['signature']?></div></td>
				<td><a href="edit_tamu.php?id=<?php echo $data['id_tamu']; ?>"><button>Edit</button></a>
					<a href="proses_hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data?')"><button>Hapus</button></a>
					<a href="print.php?id=<?php echo $data['id']; ?>" target="_BLANK" rel="noopener noreferrer"><button>Print</button></a>
					<a href="ttd/sample/index.php?id=<?php echo $data['id']; ?>&idttd=<?php echo $data['id_tamu']; ?>&nama=<?php echo $data['id_tamu']; ?>"><button>TTD</button></a>
				</td>
		</tr>
		<?php
		}
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