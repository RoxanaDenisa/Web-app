<?php 
	session_start();
	require "conect_bazadedate.php";
	if(isset($_SESSION['nume']))
		$user_name = $_SESSION['nume'];
	else{
		$user_name="user_anonim";
	}
	$nume_pren = $_POST['nume_pren'];
	$adresa = $_POST['adresa'];
	$telefon = $_POST['telefon'];
	$cos = $_POST['cart'];
	
	$nume_prod=$cos[0][0];
	$nume_prod2=$cos[0][1];
	$nume_prod3=$cos[0][2];
	$nume_prod4=$cos[0][3];
	$nume_prod5=$cos[0][4];
	$nume_prod6=$cos[0][5];
	
	$strSQL="INSERT INTO comenzi(`user_name`, `nume_prenume`, `localitate`, `telefon`, `nume_produs`, `pret`, `id_produs`, `size`, `cantitate`, `img`) VALUES ('$user_name','$nume_pren','$adresa','$telefon','$nume_prod','$nume_prod2','$nume_prod3','$nume_prod4','$nume_prod5','$nume_prod6')";//verificare ca contul sa nu existe in baza de date
	$result = mysqli_query( $link, $strSQL );//trimite interogarea spre executie la BD
	
	if($result!=false)
		echo "1";
?>