
<html>
	<head>
		<link rel="stylesheet" href="css/index.css">
		<script src="js/jquery351.js"></script>
		<script src="js/notify.js"></script>
	</head>
	
	<body>
		<ul class="meniu">
			<li> <img src="image/cosdecumparaturi.png"> </li>
			<li> <img src="image/favorite.png"> </li>
			<?php
				session_start();
				if(isset($_SESSION['nume'])){
					echo '<li><div class="nume">'.$_SESSION['nume'].'</div><img class="p_picture" onclick="afiseaza_meniu_profil()" src="image/profil.png">
						<ul class="lista_profil">
							<li> Comenzile mele</li>
							<li><a href="php/deconectare.php">Deconectare</a></li>
						</ul>
					</li>';
				}
				else
					echo '<li>
							<img src="image/profil.png" onclick="deschide_autentificare()">
							<div id="login"> <form action="php/login.php" method="post">
								<input type="text" id="fname" placeholder="nume" name="nume"><br><br>
								<input type="password" placeholder="parola" id="lname" name="parola"><br><br>
								<input type="submit" value="Submit">
								</form>
								<p id="replace_login"> Nu ai încă un cont?</p>
							</div>
						 </li>  
				';
			?>
			<li class="search_container">
				<input id="search_bar" placeholder="Cauta"> </input>
				<img class="lupa" src="image/search.png" >
			</li>
			<li class="logo">
				<img src="image/logo.jpg">
			</li>
		</ul>
		<div class="container">
			
				<div id="product">
					<img src="image/accesoriu4p3.jpg">
					<p id="descriere">Rochie de zi</p>
					<p id="pret">230 Lei</p>
				</div>
				
				<div id="product">
					<img src="image/b4p4.jpg">
					<p id="descriere">Cămașă cu fundă</p>
					<p id="pret">10 Lei</p>
				</div>
				
				<div id="product">
					<img src="image/accesoriu4p3.jpg">
					<p id="descriere">Pantaloni</p>
					<p id="pret">10 Lei</p>
				</div> 	
				
				<div id="product">
					<img src="image/accesoriu4p3.jpg">
					<p id="descriere">Cămașă</p>
					<p id="pret">10 Lei</p>
				</div>
				
				<div id="product">
					<img src="image/accesoriu4p3.jpg">
					<p id="descriere">Sandale</p>
					<p id="pret">10 Lei</p>
				</div>
				
				<div id="product">
					<img src="image/accesoriu4p3.jpg">
					<p id="descriere">Pantofi</p>
					<p id="pret">10 Lei</p>
				</div> 
			</div>
			
			
		
		<div id="butoane">
			  <div id="buton"><a href="#">Rochii</a></div>
			  <div id="buton"><a>Fuste</a></div>
			  <div id="buton"><a >Pantaloni</a></div>
			  <div id="buton"><a>Bluze</a></div>
			</div>
		


	<script src="js/index.js"></script>
	</body>
</html>
