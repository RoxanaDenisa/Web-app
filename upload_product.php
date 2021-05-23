<?php
	session_start();
	
	if(isset($_SESSION['nume']) && $_SESSION['nume']!="admin" || !isset($_SESSION['nume']))
		header("Location: index.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="js/jquery351.js"></script>
	<script src="js/notify.js"></script>
	<link rel="stylesheet" href="css/upload_product.css">
	<style>
		body{
			background: url("image/upbg.jpg");
			background-size: 100%;
			background-repeat: no-repeat;
			/*position: fixed;*/
		}
		#form{
			margin: 0 auto;
			width: 38%;
			background-color:#ffffffb5;
			padding: 68px 16px 30px 16px;
			border-radius: 14px;
		}
		.bb{
			position: absolute;
			top: 23px;
			left: 475px;
			
		}
		.sub{
			background-color: rgba(213, 126, 126, 0.83);
			margin: 0 auto;
			display: block;
			padding: 10px 29px;
			border-radius: 14px;
			border: solid #5a5a5a 2px;
		}
		
		textarea{
			border-radius: 10px;
		}
		
		#add_size > li > .sizes, #add_size > li > .counts{
			margin-top: 10px;
			margin-left: 5px;
		}
	</style>
</head>
	<body>

	<form id="form" action="php/upload_product.php" method="post" enctype="multipart/form-data">
		
		<input type="text" placeholder="Nume produs" name="product_name">
		<input type="text" placeholder="Categorie" name="category">
		<input type="text" placeholder="Preț" name="price"><br><br>
		
		<input type="file" name="pictures[]"/>
		<input type="file" name="pictures[]"/><br><br>
		<input type="file" name="pictures[]"/>
		<input type="file" name="pictures[]"/><br><br>
		<!--size array-->
		
		<ul id="add_size" name="sizes">
		<li>
		<input class='sizes' type='text' value='Mărime'/>
		<input class='counts' type='text' value='Cantitate'/></li>

		</ul>
		
		<input id="size" type="text" placeholder="adaugă mărime">
		<input id="count" type="text" placeholder="adaugă cantitatea">

		<button type="button" id="add_size_btn">+</button><br><br>
			
		<textarea name="description" cols="75" rows ="20" form="form" style="background-color: rgba(213, 126, 126, 0.83)">sfdgfhb</textarea><br><br>
		<input class="sub" type="submit"> <br>
		<a class="bb" href="index.php"> <img src="image/back.png" width=50px > </a>
		
	</form>
	<script src="js/adauga_produs.js"></script>
	</body>
</html>





