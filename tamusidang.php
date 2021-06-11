<?php
session_start();
if (!isset($_SESSION['iduser'])) {
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


	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/jumbotron/">

	<!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- jQuery UI Signature core CSS -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
	<link href="./ttd/assets/css/jquery.signature.css" rel="stylesheet">

	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/apple-touch-icon.png" sizes="32x32" type="image/png">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/safari-pinned-tab.svg">
	<meta name="msapplication-config" content="https://getbootstrap.com/docs/4.4/../assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">

	<style>
		.kbw-signature {
			width: 100px;
			height: 100px;
		}

		.crop{
				zoom : 50%;
				margin : 25px 25px 100px 25px;
		}

	</style>
	<!-- Custom styles for this template -->
	<link href="https://getbootstrap.com/docs/4.4/examples/jumbotron/jumbotron.css" rel="stylesheet">


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
				Hi! <?= $_SESSION['username'] ?>
				<ul>
					<li><a href="logout.php" class="highlight">Logout</a></li>
				</ul>
			</div>
		</div>

		<br />

	</header>
	<br />
	<a href="index.php">
		<button>
			< Lihat Semua Data</button>
	</a>

	<h3>Tamu Persidangan</h3>

	<div style="overflow: auto;">
	<table border="2" class="table"  width=100%>
		<tr>
			<th>ID Tamu</th>
			<th>ID Sidang</th>
			<th>Nama</th>
			<th>Nik</th>
			<th>Alamat</th>
			<th>Sebagai</th>
			<th>tanda tangan </th>
			<th>Opsi</th>

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
					<a href="ttd/sample/index.php?id=<?php echo $data['id']; ?>&idttd=<?php echo $data['id_tamu']; ?>&nama=<?php echo $data['id_tamu']; ?>"><button>Tanda Tangan</button></a>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="./ttd/assets/js/jquery.signature.js"></script>

	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<!-- <script>
		$(document).ready(function() {

			var signatureContainer = $('.signatureContainer').signature();
			var sign = $('.signatureContainer').html();
			// console.log(sign);
			// signatureContainer.signature('draw', sign);
			$('#tabletamu tr').each(function() {
				var td = $(this).closest('td');
				console.log($(td).attr("signature"));
			});
		});
	</script> -->
</body>

</html>