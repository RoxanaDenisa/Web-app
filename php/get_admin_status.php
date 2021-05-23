<?php
	session_start();
		if(isset($_SESSION['nume']) && $_SESSION['nume']=="admin")
			echo "1";
		else
			echo "0";