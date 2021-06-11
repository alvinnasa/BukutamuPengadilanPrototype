<?php
    if(isset($_GET['id_tamu'])){
        $id_tamu    =$_GET['id_tamu'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "+koneksi.php";
    $query    =mysqli_query($conn, "SELECT * FROM tamu WHERE id_tamu='$id_tamu'");
    $result    =mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Script PHP untuk Menampilkan Data dari Database Derdasarkan Id</title>
</head>
<body>
    <h2>Detail Data Karyawan</h2>
    <p><i>Note: Dibawah ini adalah detail informasi karyawan berdasarkan id_karyawan</i> <b><?php echo $id_tamu?></b></p>
    <table border="0" cellpadding="4">
        <tr>
            <td size="90">NIK</td>
            <td>: <?php echo $result['nik']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $result['nama']?></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td>: <?php echo $result['tempat_lhr']?>, <?php echo $result['tgl_lhr']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $result['jk']?></td>
        </tr>
        <tr>
            <td>Department</td>
            <td>: <?php echo $result['dept']?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: <?php echo $result['jabatan']?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <?php echo $result['status']?></td>
        </tr>
        <tr height="40">
            <td></td>
            <td>   <a href="./">Kembali</a></td>
        </tr>
    </table>
</body>
</html>