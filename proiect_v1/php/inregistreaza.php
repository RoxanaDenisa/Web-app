<?php 
	require "conect_bazadedate.php";
	
	$nume=mysqli_real_escape_string($link, $_POST['nume']);//a preveni SQL injection
	$mail=$_POST['mail'];
	$parola=$_POST['parola'];
	
	$strSQL="SELECT * FROM `conturi` WHERE nume='$nume'";//verificare ca contul sa nu existe in baza de date
	$result = mysqli_query( $link, $strSQL );//trimite interogarea spre executie la BD
	//print_r($result);
	$parola= hash("sha512",$parola);
	if ($result->num_rows==0){
		$strSQL = "INSERT INTO conturi(Nume, Mail, Parola) VALUES ('$nume','$mail','$parola')"; 
		$result = mysqli_query( $link, $strSQL );
		header("Location: ../index.php?msg=succes"); //redirectare
	}else
		header("Location: ../index.php?msg=error"); //redirectare
?>