<?php //sunt conștientă ca un astfel de script pe server reprezinta o vulnerabilitate a aplicației web
	$dir = $_POST["dir"];

	$out = array();
	foreach (glob($dir) as $filename) {
	    $p = pathinfo($filename);
	    $out[] = $p['basename'];
	}
	echo json_encode($out); 
?>