<?php 
	require "conect_bazadedate.php";
	$rows = array();
	
	$id=$_POST["id"];	
	$strSQL="DELETE FROM produse WHERE id='$id'";
	$result = mysqli_query( $link, $strSQL );
	
	if(!$result)
		header("Location: index.php?msg=prod_undel");
	exit();
?>