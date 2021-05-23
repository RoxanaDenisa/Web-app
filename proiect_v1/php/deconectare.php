<?php

	session_start();
	session_unset();//sterge variabilele din sesiune
	session_destroy();
	header("Location: ..");
?>