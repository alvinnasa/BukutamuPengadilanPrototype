<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "+koneksi.php";

$jenis_perkara = $_POST['jenis'];
$nama_perkara = $_POST['perkara'];
$tglnya = $_POST['tgl'];
$jamnya = $_POST['jam'];
$ruangnya = $_POST['ruang'];
$hakimnya = $_POST['hakim'];
$penggugatnya = $_POST['penggugat'];
$terdakwanya = $_POST['terdakwa'];


$query = $con->prepare("INSERT INTO detail_sidang (jenis, perkara, tgl, jam, ruang, hakim, penggugat, terdakwa) 
                        VALUES (:jenis, :perkara, :tgl, :jam, :ruang, :hakim, :penggugat, :terdakwa)");

$query->bindparam(':jenis', $jenis_perkara); 
$query->bindparam(':perkara', $nama_perkara);
$query->bindparam(':tgl', $tglnya);
$query->bindparam(':jam', $jamnya);
$query->bindparam(':ruang', $ruangnya);
$query->bindparam(':hakim', $hakimnya);
$query->bindparam(':penggugat', $penggugatnya);
$query->bindparam(':terdakwa', $terdakwanya);

if($query->execute()) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}


?>