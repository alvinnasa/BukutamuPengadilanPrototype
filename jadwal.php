<html>
<head>
    <title> Menampilkan Data Berdasarkan Tanggal Sekarang di PHP</title>
</head>
<body>
    <div style="border:0px solid #B0C4DE; padding:5px; overflow:auto;">
        <?php
            include "+koneksi.php";
            $tgl    =date("Y-m-d");
        ?>
        <form action="jadwal.php" method="post" name="postform">
            <p align="center"><font color="orange" size="3"><b>Jadwal Persidangan</b></font></p>
            <table border="0">
                <tr>
                    <td width="80"><input type="submit" value="Tampilkan Data" name="tampil"/></td>
                </tr>
				
            </table>
        </form>
        <p>
        <?php
           
            if(isset($_POST['tampil'])){

			$query = $con->query("SELECT * FROM detail_sidang WHERE tgl = '$tgl' ")
        ?>
        </p>
        <table align="center" border="0" width="1000">
            <tr bgcolor="#FF6600">
                <th width="20" height="40">No</td> 
				<th width="80">Jenis Perkara</td>
                <th width="70">Persidangan perkara</td> 
                <th width="80">Tanggal</td> 
                <th width="70">Jam</td> 
                <th width="80">Ruangan</td>  
				<th width="70">Hakim ketua</td> 				
            </tr>
            <?php
                //menampilkan data
                $no=0;
				while($data = $query->fetch(PDO::FETCH_ASSOC)){
                $no++
            ?>
            <tr>
                <td align="center" height="30"><?php echo $no?></td>
                <td><?php echo $data['jenis']?></td>
                <td><?php echo $data['perkara']?></td>
                <td><?php echo $data['tgl']?></td>
				<td><?php echo $data['jam']?></td>
				<td><?php echo $data['ruang']?></td>
            	<td><?php echo $data['hakim']?></td>
		
            </tr>
            <?php
                }
            ?>    
            
        </table>
        <?php
            }
            else{
                unset($_POST['tampil']);
            }
        ?>
</body>
</html>