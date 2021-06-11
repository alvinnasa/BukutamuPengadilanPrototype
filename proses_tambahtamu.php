<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "+koneksi.php";
$namatamunya = $_POST['namatamu'];
$idnya = $_POST['id'];
$niknya = $_POST['nik'];
$alamatnya = $_POST['alamat'];
$sebagainya = $_POST['sebagai'];


$query = $con->prepare("INSERT INTO tamu (namatamu, id, nik, alamat, sebagai) 
                        VALUES (:namatamu, :id, :nik, :alamat, :sebagai)");

$query->bindparam(':namatamu', $namatamunya); 
$query->bindparam(':id', $idnya);
$query->bindparam(':nik', $niknya);
$query->bindparam(':alamat', $alamatnya);
$query->bindparam(':sebagai', $sebagainya);

echo $_POST['namatamu'];
echo $_POST['id'];
echo $_POST['nik'];
echo $_POST['alamat'];
echo $_POST['sebagai'];


if($query->execute()) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}

?>