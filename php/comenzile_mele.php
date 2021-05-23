<?php 
    session_start();
	require "conect_bazadedate.php";
	$rows = array();
	$logedInUsername = $_SESSION['nume'];
	$strSQL="SELECT `user_name`, `nume_prenume`, `localitate`, `telefon`, `nume_produs`, `pret`, `id_produs`, `size`, `cantitate`, `img` FROM `comenzi` WHERE user_name='$logedInUsername'";//verificare ca contul sa nu existe in baza de date
	$result = mysqli_query( $link, $strSQL );//trimite interogarea spre executie la BD
	while($row = mysqli_fetch_assoc($result))
	    $rows[] = $row;

	
	if($result!=false)
		echo json_encode($rows);
	
?>