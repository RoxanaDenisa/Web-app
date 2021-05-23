<?php
	session_start();
	if(isset($_SESSION['nume'])){
		header("Location: index.php"); //redirectare
	}
?>

<form action="php/login.php" method="post">
  <label for="fname">Nume:</label>
  <input type="text" id="fname" name="nume"><br><br>
  
  
  <label for="lname">Parola:</label>
  <input type="text" id="lname" name="parola"><br><br>
  
  <input type="submit" value="Submit">
</form>