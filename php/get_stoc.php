<?php 
	require "conect_bazadedate.php";
	$rows = array();

	$id_prod=$_POST["id"];
	$strSQL="SELECT * FROM stoc WHERE id_product='$id_prod';";
	$result = mysqli_query( $link, $strSQL );

	while($row = mysqli_fetch_array($result))
	    $rows[] = $row;

	echo json_encode($rows);
?>