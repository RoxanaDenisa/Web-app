<?php 
	require "conect_bazadedate.php";
	session_start();
			
	
	$nume=mysqli_real_escape_string($link, $_POST['nume']);
	$parola=mysqli_real_escape_string($link,$_POST['parola']);
	
	if($nume=="admin" && $parola=="admin"){ //înregistrează administratorul
		$_SESSION['nume'] = "admin";
		header("Location: ../index.php");
		exit();
	}

	$parola= hash("sha512",$parola);
	$strSQL="SELECT * FROM `conturi` WHERE nume='$nume' and parola='$parola';";
	$result = mysqli_query( $link, $strSQL );
	//$row = mysqli_fetch_assoc($result);
	
	if ($result->num_rows!=0){
		$_SESSION['nume'] = $nume;
		header("Location: ../index.php");
	}else
		header("Location: ../index.php?msg=wrong_usr_or_pass");
	exit();
	
?>