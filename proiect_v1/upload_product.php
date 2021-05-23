<!DOCTYPE html>

<html>
<head>
<script src="js/jquery351.js"></script>
<script src="js/notify.js"></script>
<link rel="stylesheet" href="css/upload_product.css">

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
	<input type="submit"> <br>
	<a href="#"> <img src="image/back.png" width=50px > </a>
	
</form>
<script src="js/adauga_produs.js"></script>
</body>
</html>





