<?php
	require 'conect_bazadedate.php';
	
	$uploaddir = getcwd().'/../products';
	
	$product_name=mysqli_real_escape_string($link,$_POST['product_name']);
	$category=$_POST['category'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$url = "products/".$product_name;
	//incarac imaginile produselor	
		
	//C:\xampp\tmp\phpC697.tmp - deafult location for uploadead files
	//https://www.php.net/manual/ro/features.file-upload.post-method.php
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK){
			$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
			$name = basename($_FILES["pictures"]["name"][$key]);// basename() may prevent filesystem traversal attacks;	
			if(!file_exists($uploaddir."/$product_name/"))
				mkdir($uploaddir."/$product_name/");
			move_uploaded_file($tmp_name, $uploaddir."/$product_name/".$name);
		}
	}
	//încarcă produs în baza de date
	
	$sql="INSERT INTO produse(nume_produs, categorie, pret, url_imagini, descriere) VALUES('$product_name','$category','$price','$url','$description')";
	$result=mysqli_query( $link, $sql);
	
	if(!$result)
		die("eroare db");
	//get last generated id
	$sql="select max(id) as 'id' from produse";
	$result=mysqli_query( $link, $sql);
	$data=mysqli_fetch_assoc($result);	
	$inserted_id=$data['id'];

	print_r($_POST['sizes']);
	print_r($_POST['counts']);
	$c=count($_POST['sizes']);
	
	//die(0);
	for($i=0; $i<$c; $i++){
		$s=$_POST['sizes'][$i];
		$co=$_POST['counts'][$i];
		$sql="INSERT INTO stoc(id_product, marimea, cantitate) VALUES ('$inserted_id','$s','$co')";
		echo $sql;
		$result=mysqli_query( $link, $sql);
		if(!$result)
				die("eroare de inserare in db");
	}
	echo $sql;
	//optional validare inputuri
?>