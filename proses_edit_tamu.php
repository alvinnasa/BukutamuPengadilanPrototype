<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "+koneksi.php";

$params = [
    "id"        => $_POST['id'],
    "jenis"     => $_POST['jenis'],
    "perkara"      => $_POST['perkara'],
    "tgl"     => $_POST['tgl'],
    "jam"     => $_POST['jam'],
    "ruang"       => $_POST['ruang'],
    "hakim"     => $_POST['hakim'],
    "terdakwa"  => $_POST['terdakwa'],
    "penggugat"   => $_POST['penggugat'],

  ];

$sql = "UPDATE detail_sidang SET
            jenis = :jenis,
            perkara = :perkara,
            tgl = :tgl,
            jam = :jam,
            ruang = :ruang,
            hakim = :hakim,
            terdakwa = :terdakwa,
            penggugat = :penggugat

        WHERE id = :id";
$query = $con->prepare($sql);
if($query->execute($params)) { // prepare > execute menggunakan parameter array
    echo "<script>alert('Data berhasil diedit'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}


?>