<?php 
	require "conect_bazadedate.php";
	session_start();
			
	
	$nume=mysqli_real_escape_string($link, $_POST['nume']);
	$parola=$_POST['parola'];
	$parola= hash ("sha512",$parola);
	
	$strSQL="SELECT * FROM `conturi` WHERE nume='$nume' and parola='$parola'";
	
	
	$result = mysqli_query( $link, $strSQL );
	if ($result->num_rows==0)
	{
		echo "username sau parola gresita";

	}
	else{
		$_SESSION['nume'] = $nume;
		echo "Bine ai venit";
		
		header("Location: ../index.php");
	}
	


?>