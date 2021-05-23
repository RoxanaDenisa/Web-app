<html>
	<head>
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/slick.css"/>
		<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
		<script src="js/jquery351.js"></script>
		<script type="text/javascript" src="js/slick.js"></script>
		<script src="js/notify.js"></script>
		<meta charset="utf-8">
	</head>
	
	<body>
		<ul class="meniu">
		<?php
				session_start();
				
				if(isset($_SESSION['nume']) && $_SESSION['nume']=="admin"){
					echo '<li></li><li><a href="upload_product.php"><img src="image/add.png"> </a></li>';
					echo '  <li>
								<img class="p_picture" onclick="afiseaza_meniu_profil()" src="image/profil.png">
								<div class="nume">'.$_SESSION['nume'].'</div>
								<ul class="lista_profil">
									<li> </li>
									<li><a href="php/deconectare.php">Deconectare</a></li>
								</ul>
							</li>
					';
				}else{
					echo '<li> <img id="cdc" src="image/cosdecumparaturi.png"> </li>
					<li style="	margin: 0; padding: 0;"> </li>';
					if(isset($_SESSION['nume']))
						echo '  <li>
									<img class="p_picture" onclick="afiseaza_meniu_profil()" src="image/profil.png">
									<div class="nume">'.$_SESSION['nume'].'</div>
									<ul class="lista_profil">
										<li id="com"> Comenzile mele</li>
										<li><a href="php/deconectare.php">Deconectare</a></li>
									</ul>
								</li>';
					else
						echo '  <li>
									<img src="image/profil.png" onclick="deschide_autentificare()">
									<div id="login">
										<form action="php/login.php" method="post">
											<input type="text" id="fname" placeholder="nume" name="nume"><br><br>
											<input type="password" placeholder="parola" id="lname" name="parola"><br><br>
											<input type="submit" value="Submit">
										</form>
										<p id="replace_login"> Nu ai încă un cont?</p>
									</div>
								</li>';
				}
			?>
			<li class="search_container">
				<input id="search_bar" placeholder="Cauta"> </input>
				<img class="lupa" src="image/search.png" >
			</li>
			<li class="logo">
				<a href="index.php"><img src="image/logo.jpg"></a>
			</li>
		</ul>
		<!--genereaza sectiunile + produsele din baza de date-->
		<div class="container">
			<!--<div class="slideshow">
				<div><img src="image/bluza2p1.jpg"></div>
				<div><img src="image/bluza2p2.jpg"></div>
				<div><img src="image/bluza2p3.jpg"></div>
				<div><img src="image/bluza2p4.jpg"></div>
			</div>-->
		</div>
		<div id="butoane">
		</div>
		<script>
			
		</script>
	<script src="js/index.js"></script>
	<script src="js/load_products.js"></script>
	</body>
</html>
