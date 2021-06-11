<?php 
$con = mysqli_connect('localhost','root','','pengadilancilacap') or die("ERROR");

$output = array();
if(isset($_POST['action'])){
	if($_POST["action"] == "saveJson"){
			try{	
				$person_Name = '';
				$person_Signature = $_POST["signature"];

				$sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES ($ID, '$person_Name', '$person_Signature');";
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "Succesfully Save as JSON";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}

			

	}
		if($_POST["action"] == "saveSVG"){
			try{	
				$person_Name = '';
				$person_Signature = $_POST["signature"];

				$sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES (NULL, '$person_Name', '$person_Signature');";
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "Succesfully Save as SVG";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}

			

	}
	if($_POST["action"] == "load"){
		
			$person_ID = $_POST["person_ID"];
			$sql = "SELECT * FROM `tamu` where id_tamu = '$person_ID'";
			$query=mysqli_query($con,$sql);
			while( $row=mysqli_fetch_array($query) ) 
			{ 
				$output["ID"] = $row["id_tamu"];
				$output["Name"] = $row["namatamu"];
				$output["Signature"] = $row["signature"];
			}
			

	}
	if($_POST["action"] == "delete"){
		
			$idtamu = $_POST["idtamu"];
			$sql = "UPDATE `tamu` SET `signature` = NULL WHERE id_tamu = '".$idtamu."' ;";
			$query=mysqli_query($con,$sql);
			if(!empty($query))
			{
			
			 	$output["msg"] = "Succesfully Deleted";
			}
			
			

	}
	if($_POST["action"] == "submit"){

		$output["msg"] = "submit";
		try{	
				$idtamu = $_POST["idtamu"];
				$person_Signature = $_POST["signature"];

				// $sql = "INSERT INTO `person` (`ID`, `Name`, `Signature`) VALUES (NULL, '$person_Name', '$person_Signature');";
				$sql = "UPDATE `tamu` SET `signature` = '".$person_Signature."' WHERE id_tamu = '".$idtamu."' ;";
				// var_dump($sql);
				$query=mysqli_query($con,$sql);

				if(!empty($query))
				{
				
				 	$output["msg"] = "BERHASIL MENYIMPAN TANDA TANGAN";
				    
				}
			
			} 
			catch (PDOException $e)
			{
			   $output["msg"] = "There is some problem in connection: " . $e->getMessage();
			}
	}


}




echo json_encode($output);
?>