<?php 
  $con = mysqli_connect('localhost','root','','pengadilancilacap') or die("ERROR");

$idparam = $_POST["id"];
// var_dump($idparam);
$query = '';
$output = array();
$query .= "SELECT *";
$query .= " FROM `tamu`";
 $query .= ' WHERE id = '.$idparam.'';

// if(isset($_POST["search"]["value"]))
// {
//  	$query .= ' ( id_tamu LIKE "%'.$_POST["search"]["value"].'%" ';
//     $query .= 'OR namatamu LIKE "%'.$_POST["search"]["value"].'%" )';  
// }


// if(isset($_POST["order"]))
// {
// 	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
// 	$query .= 'ORDER BY ID DESC ';
// }

$result=mysqli_query($con,$query);
$filtered_rows = mysqli_num_rows($result) ;
while( $row=mysqli_fetch_array($result) ) 
{ 

	$sub_array = array();
	
		
		$sub_array[] = $row["id_tamu"];
		$sub_array[] =  $row["namatamu"];
		$sub_array[] = '
		<div class="btn-group">
		<button class="btn btn-primary" id="loadSignature" data-id="'.$row["id_tamu"].'">Load</button>

		<button class="btn btn-danger" id="deleteSignature" data-id="'.$row["id_tamu"].'">Delete</button>
		</div>
		';
	$data[] = $sub_array;
}

$query = "SELECT * FROM `person`";
$result=mysqli_query($con,$query);
$filtered_rec = mysqli_num_rows($result);

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rec,
	"data"				=>	$data
);
echo json_encode($output);



?>



        
