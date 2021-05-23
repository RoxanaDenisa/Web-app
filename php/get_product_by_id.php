<?php 
	require "conect_bazadedate.php";
	$rows = array();
	$id = $_POST["id"];	
	$strSQL="SELECT * FROM produse WHERE id LIKE '$id';";
	$result = mysqli_query( $link, $strSQL );
	
	while($row = mysqli_fetch_assoc($result))
	    $rows[] = $row;

	echo json_encode($rows);
	exit();
?>