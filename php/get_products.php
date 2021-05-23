<?php 
	require "conect_bazadedate.php";
	$rows = array();
	$categorie=$_POST["categorie"];	
	$strSQL="SELECT * FROM produse WHERE categorie LIKE '$categorie';";
	$result = mysqli_query( $link, $strSQL );
	
	while($row = mysqli_fetch_assoc($result))
	    $rows[] = $row;

	echo json_encode($rows);
	exit();
?>